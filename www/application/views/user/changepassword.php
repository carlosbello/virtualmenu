<?php
/**
 * Listado de usuarios.
 *
 * @author Leoanrdo Quintero
 */
?>

                <script>
                    $(function() {
                        $(".button").button();
                    });   
                </script>

                <h1 class="formTitle">Cambiar contraseña</h1>
                <br>
                <div class="form">
                    <?php
                    if (isset($error)) {
                        ?>   
                        <div class="formError">
                            <?php echo $error ?>
                        </div>
                        <div class="formClear">&nbsp;</div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($message)) {
                        ?>   
                        <div class="formMessagge">
                            <?php echo $message ?>
                        </div>
                        <div class="formClear">&nbsp;</div>
                        <?php
                    }
                    ?>
                    <form action="<?php echo site_url('changePassword') ?>" method="post" accept-charset="utf-8" class="formChangePassword" id="formChangePassword">

                        <div class="formLabel"><label for="old_password">Contraseña actual:</label></div>
                        <div class="formData">                 
                            <input type="password" name="old_password" value="" id="old_password" maxlength="32" style="width:50%"  />
                        </div>
                        <div class="formError"><?php echo form_error('old_password'); ?></div>
                        <div class="formClear">&nbsp;</div>

                        <div class="formLabel"><label for="new_password">Nueva contraseña:</label></div>
                        <div class="formData">                 
                            <input type="password" name="new_password" value="" id="new_password" maxlength="32" style="width:50%"  />
                        </div> 
                        <div class="formError"><?php echo form_error('new_password'); ?></div>  
                        <div class="formClear">&nbsp;</div>

                        <div class="formLabel"><label for="new_confirm">Repetir nueva contraseña:</label></div>
                        <div class="formData">                 
                            <input type="password" name="new_confirm" value="" id="new_confirm" maxlength="32" style="width:50%"  />
                        </div> 
                        <div class="formError"><?php echo form_error('new_confirm'); ?></div>  
                        <div class="formClear">&nbsp;</div>

                        <div class="formButton">
                            <input type="submit" class="button" value="Aceptar"/>
                            <div>
                                <br>
                                <a href="<?php echo site_url('profile') ?>"><input type="button" class="button" value="Configurar cuenta"/></a>
                            </div>
                        </div>
                        <div class="formClear">&nbsp;</div>
                    </form>
                </div>
