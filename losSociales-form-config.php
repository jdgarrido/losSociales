<div id="message" class="">El mensaje</div>
<div class="wrap">
    <h2>Los Sociales</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare enim vitae sapien tincidunt fermentum eget quis felis. Suspendisse at nibh eget eros adipiscing placerat. Cras quis vulputate purus. Sed at purus sit amet nisi ornare consectetur ornare ut diam. Ut tellus augue, eleifend non dignissim non, imperdiet nec nisi. Fusce eget justo diam. Aliquam dapibus venenatis massa quis malesuada. In sit amet orci est, congue condimentum risus. Donec id purus enim. Quisque sollicitudin elementum pulvinar. Vivamus et nisi id tellus convallis commodo. 
    </p>
    
    <form method="post" name="elFormulario" action="">
        <?= settings_fields( 'losSociales_options' ); ?>
        <h3>Configuración General</h3>
        <table class="form-table">
            <tr>
                <th scope="row">El Twitter</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>El Twitter</span></legend>
                        <label for="elTwitter">
                            <input type="checkbox" name="elTwitter" id="elTwitter" value="1" <?php echo (get_option('elTwitter')) ? 'checked=checked' : ''?> />
                            Habilita/Deshabilita el botón de Twitter
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">El FaceBook</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>El FaceBook</span></legend>
                        <label for="elFacebook">
                            <input type="checkbox" name="elFacebook" id="elFacebook" value="1" <?php echo (get_option('elFacebook')) ? 'checked=checked' : ''?> />
                            Habilita/Deshabilita el botón de FaceBook
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">El Google Plus</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>El Google Plus</span></legend>
                        <label for="elGooglePlus">
                            <input type="checkbox" name="elGooglePlus" id="elGooglePlus" value="1" <?php echo (get_option('elGooglePlus')) ? 'checked=checked' : ''?> />
                            Habilita/Deshabilita el botón de Google Plus
                        </label>
                    </fieldset>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
        <input type="hidden" name="losSociales_update" value="true" />
    </form>
</div>
<?php
echo ':)';
