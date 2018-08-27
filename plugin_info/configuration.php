<?php
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

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
	include_file('desktop', '404', 'php');
	die();
}
?>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="col-lg-4 control-label">{{Adresse Gmail}}</label>
            <div class="col-lg-4">
                <input class="configKey form-control" data-l1key="google_user"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">{{Mot de passe}}</label>
            <div class="col-lg-4">
                <input class="configKey form-control" data-l1key="google_password" type="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">{{Fréquence de rafraichissement}}</label>
            <div class="col-lg-4">
                <input class="configKey form-control" data-l1key="refresh::frequency" />
            </div>
        </div>
        <div class="form-group">
           <label class="col-lg-4 control-label">{{Forcer déconnexion}}</label>
           <div class="col-lg-2">
              <a class="btn btn-default" id="bt_logoutGsl"><i class='fa fa-sign-out'></i> {{Déconnexion}}</a>
          </div>
      </div>
  </fieldset>
</form>
<script>
    $('#bt_logoutGsl').on('click', function () {
        $.ajax({
            type: "POST",
            url: "plugins/gsl/core/ajax/gsl.ajax.php",
            data: {
                action: "logout",
            },
            dataType: 'json',
            error: function (request, status, error) {
                handleAjaxError(request, status, error);
            },
            success: function (data) {
                if (data.state != 'ok') {
                    $('#div_alert').showAlert({message: data.result, level: 'danger'});
                    return;
                }
                $('#div_alert').showAlert({message: '{{Déconnexion réussie}}', level: 'success'});
            }
        });
    });
</script>
