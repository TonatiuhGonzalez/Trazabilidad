<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>Login</title>
        <link href="<?php echo base_url()?>dist/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>dist/css/login.css" rel="stylesheet" />
        
    </head>
    <body>
        <div>
            <div>
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg login">
                                    <div class="card-header">
                                      <div class="imagen text-center" ><img src="<?php echo base_url()?>/dist/img/nuevologo2.png" ></div>
                                      <!-- <h3 class="text-center font-weight-light my-4">Login</h3> -->
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url()?>vu" method="post">
                                            <div class="form-group"><label class="small mb-1" >Correo Electrónico</label>
                                            <input class="form-control py-4" name="nombre" type="email" placeholder="Ingresa tu Correo Electrónico" required="true"/>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" >Contraseña</label>
                                            <input class="form-control py-4" name="clave" type="password" placeholder="Ingresa tu Contraseña" required="true"/>
                                            </div>                                                                                       
                                            <div class="form-group form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                              <button class="btn btn-primary boton-log" type="submit" >Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <?php if($this->session->flashdata("error")){?>
                                            <div class="alert alert-warning alert-dismissible fade show" >
                                            <strong class="text-center" ><?php echo $this->session->flashdata("error")?></strong>
                                               
                                            </div>
                                        <?php }elseif(!$this->session->flashdata("error")){?>
                                        <div class="small"><H5> Bienvenido</H5></div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         
        </div>
        
    </body>
</html>
