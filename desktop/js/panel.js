
/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

 function autosizeGslWidget(){
    var nbGslByLine = (nbGslWidget == 3) ? 2 : 3;
    var totalWidth = $('#div_displayObject').width() + 20;
    var totalHeight = $(window).outerHeight() - $('header').outerHeight() - $('#div_alert').outerHeight() - 20;
    var gslWidth = (totalWidth / nbGslByLine) - (6 * nbGslByLine);
    var gslHeight = (totalHeight / 2) - (2 * 2);
    $('#div_displayObject .eqLogic-widget').each(function(){
        if($(this).hasClass('gslGlobal')){
            $(this).width(totalWidth - 23);
            $(this).height(totalHeight / 2);
            $(this).find('.leaflet-container').height( $(this).height() - 40)
        }else{
          $(this).width(gslWidth);
          $(this).height(gslHeight);
          $(this).find('.leaflet-container').height( $(this).height() - 80)
      }
      $(this).css('margin',widget_margin+'px');
  });
    $('#div_displayObject').each(function(){
        $(this).packery();
    });
}

autosizeGslWidget();