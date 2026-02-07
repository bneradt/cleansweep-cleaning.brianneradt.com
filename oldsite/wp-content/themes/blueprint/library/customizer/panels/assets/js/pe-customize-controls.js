( function( $ ) {

  var api = wp.customize;

  api.bind( 'pane-contents-reflowed', function() {

    // Reflow sections
    var sections = [];

    api.section.each( function( section ) {

      if (
        'pe_section' !== section.params.type ||
        'undefined' === typeof section.params.section
      ) {

        return;

      }

      sections.push( section );

    });

    sections.sort( api.utils.prioritySort ).reverse();

    $.each( sections, function( i, section ) {

      var parentContainer = $( '#sub-accordion-section-' + section.params.section );

      parentContainer.children( '.section-meta' ).after( section.headContainer );

    });

    // Reflow panels
    var panels = [];

    api.panel.each( function( panel ) {

      if (
        'pe_panel' !== panel.params.type ||
        'undefined' === typeof panel.params.panel
      ) {

        return;

      }

      panels.push( panel );

    });

    panels.sort( api.utils.prioritySort ).reverse();

    $.each( panels, function( i, panel ) {

      var parentContainer = $( '#sub-accordion-panel-' + panel.params.panel );

      parentContainer.children( '.panel-meta' ).after( panel.headContainer );

    });

  });


  // Extend Panel
  var _panelEmbed = wp.customize.Panel.prototype.embed;
  var _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
  var _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;

  wp.customize.Panel = wp.customize.Panel.extend({
    attachEvents: function() {

      if (
        'pe_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {

        _panelAttachEvents.call( this );

        return;

      }

      _panelAttachEvents.call( this );

      var panel = this;

      panel.expanded.bind( function( expanded ) {

        var parent = api.panel( panel.params.panel );

        if ( expanded ) {

          parent.contentContainer.addClass( 'current-panel-parent' );

        } else {

          parent.contentContainer.removeClass( 'current-panel-parent' );

        }

      });

      panel.container.find( '.customize-panel-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

            return;

          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( panel.expanded() ) {

            api.panel( panel.params.panel ).expand();

          }

        });

    },
    embed: function() {

      if (
        'pe_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {

        _panelEmbed.call( this );

        return;

      }

      _panelEmbed.call( this );

      var panel = this;
      var parentContainer = $( '#sub-accordion-panel-' + this.params.panel );

      parentContainer.append( panel.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'pe_panel' !== this.params.type
      ) {

        return _panelIsContextuallyActive.call( this );

      }

      var panel = this;
      var children = this._children( 'panel', 'section' );

      api.panel.each( function( child ) {

        if ( ! child.params.panel ) {

          return;

        }

        if ( child.params.panel !== panel.id ) {

          return;

        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( child.active() && child.isContextuallyActive() ) {

          activeCount += 1;

        }

      });

      return ( activeCount !== 0 );

    }

  });


  // Extend Section
  var _sectionEmbed = wp.customize.Section.prototype.embed;
  var _sectionIsContextuallyActive = wp.customize.Section.prototype.isContextuallyActive;
  var _sectionAttachEvents = wp.customize.Section.prototype.attachEvents;

  wp.customize.Section = wp.customize.Section.extend({
    attachEvents: function() {

      if (
        'pe_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {

        _sectionAttachEvents.call( this );

        return;

      }

      _sectionAttachEvents.call( this );

      var section = this;

      section.expanded.bind( function( expanded ) {

        var parent = api.section( section.params.section );

        if ( expanded ) {

          parent.contentContainer.addClass( 'current-section-parent' );

        } else {

          parent.contentContainer.removeClass( 'current-section-parent' );

        }

      });

      section.container.find( '.customize-section-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

            return;

          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( section.expanded() ) {

            api.section( section.params.section ).expand();

          }

        });

    },
    embed: function() {

      if (
        'pe_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {

        _sectionEmbed.call( this );

        return;

      }

      _sectionEmbed.call( this );

      var section = this;
      var parentContainer = $( '#sub-accordion-section-' + this.params.section );

      parentContainer.append( section.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'pe_section' !== this.params.type
      ) {

        return _sectionIsContextuallyActive.call( this );

      }

      var section = this;
      var children = this._children( 'section', 'control' );

      api.section.each( function( child ) {

        if ( ! child.params.section ) {

          return;

        }

        if ( child.params.section !== section.id ) {

          return;

        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( 'undefined' !== typeof child.isContextuallyActive ) {

          if ( child.active() && child.isContextuallyActive() ) {

            activeCount += 1;

          }

        } else {

          if ( child.active() ) {

            activeCount += 1;

          }

        }

      });

      return ( activeCount !== 0 );

    }

  });
  
    // show actual number value after all range inputs ("slider inputs")
  	jQuery(document).ready(function () {
		jQuery('input[type="range"]').each(function(){
		  jQuery(this).after('<div class="slider-output">'+jQuery(this).val()+'</div>');
		  jQuery(this).on('input change', function(){
			jQuery(this).next('.slider-output').html(jQuery(this).val());
		  });
		});
	});
	
	// save and refresh browser after basic or advanced option is selected
	jQuery(document).ready(function(){
		jQuery('input[name="_customize-radio-basic-or-advanced"]').on('change', function(){
			jQuery('#customize-save-button-wrapper').children().click();
			window.location.reload();
		});
	});
	
	// save and reload frame after woocommerce Product sidebar option is selected
	jQuery(document).ready(function(){
		jQuery('input[id="_customize-input-hide-sidebar-product"]').on('change', function(){
			jQuery('#customize-save-button-wrapper').children().click();
			/*window.location.reload();*/
			document.getElementById('customize-preview').src = document.getElementById('customize-preview').src;
		});
	});	

	// save and reload frame after woocommerce Category sidebar option is selected
	jQuery(document).ready(function(){
		jQuery('input[id="_customize-input-hide-sidebar-woo-category"]').on('change', function(){
			jQuery('#customize-save-button-wrapper').children().click();
			/*window.location.reload();*/
			document.getElementById('customize-preview').src = document.getElementById('customize-preview').src;
		});
	});		

	// save and reload frame after woocommerce Shop sidebar option is selected
	jQuery(document).ready(function(){
		jQuery('input[id="_customize-input-hide-sidebar-shop"]').on('change', function(){
			jQuery('#customize-save-button-wrapper').children().click();
			/*window.location.reload();*/
			document.getElementById('customize-preview').src = document.getElementById('customize-preview').src;
		});
	});	
	
	// save and reload browser after add section selection made
	//jQuery(document).ready(function(){
		//jQuery('input[id="_customize-input-add-top-feature-section-2"]').on('change', function(){
			//jQuery('#customize-save-button-wrapper').children().click();
			//window.location.reload();
			/*document.getElementById('customize-preview').src = document.getElementById('customize-preview').src;*/
		//});
	//});		
	
})( jQuery );