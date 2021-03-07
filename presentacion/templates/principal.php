<?php

require 'header.php';

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Orden de Pedido</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                      <form name="formulario" id="formulario" method="POST">                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Numero:</label>
                          <input type="text" class="form-control" name="numeroOrden" id="numeroOrden" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Nombre del cliente:</label>
                          <input type="text" class="form-control" name="cliente" id="cliente" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">                          
                          <button class="btn btn-primary" type="button" id="btnIniciarOrden"><i class="fa fa-play"></i> Iniciar Orden</button>
                        </div>
                      
                        <div id="tablaDePedido">                        
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                                                   
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoSimple">
                              <i class="fa fa-plus-square"></i> Agregar Produco Simple
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCombo">
                              <i class="fa fa-bars"></i> Agregar Combo
                            </button>
                          </div>
                          
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">                        
                            <table id="tablaTodosLosPedidos" class="table table-bordered table-striped table-sm">
                              <thead>
                                  <tr>
                                    <th>Opcion</th>
                                    <th>ID</th>                                   
                                    <th>Nombre</th>                                  
                                    <th>Precio</th>
                                    <th>Imagen</th>                                                                  
                                  </tr>
                              </thead>
                              <tbody>
                                                             
                              </tbody>
                            </table>
                          </div>
                        
                          <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
                            <button class="btn btn-primary" type="submit" id="btnConfirmarPedido"><i class="fa fa-shopping-cart"></i> Confirmar Orden</button>
                          </div>

                          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">                            
                            <button type="button" class="btn btn-primary" id="btnMetodoDePago" data-toggle="modal" data-target="#modalMetodoPago">
                              <i class="fa fa-usd"></i> Metodo de Pago
                            </button>                            
                          </div>                                            

                        </div>

                      </form>
                    </div>
                    <!--Fin centro -->
                    
                  
                    <!-- Modal Producto Simple-->
                    <div class="modal fade" id="modalProductoSimple" tabindex="-1" role="dialog" aria-labelledby="modalProductoSimple" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                            <h4 class="modal-title">Seleccione un Producto Simple</h4>
                          </div>
                          <div class="modal-body">
                            <table id="tablaTodosLosPedidos" class="table table-bordered table-striped table-sm">
                              <thead>
                                  <tr>
                                    <th>Opcion</th>                                    
                                    <th>Nombre</th>                                  
                                    <th>Precio</th>
                                    <th>Imagen</th>                                                                   
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarProductoSimple('Pizza Jamon y Queso Familiar', 45, '../../imagenesPizzas/productoSimples/pizzaJamonYQueso.jpg')" class="btn btn-warning btn-sm">
                                        <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Pizza Jamon y Queso Familiar</td>
                                    <td>45 Bs</td>
                                    <td><img src="../../imagenesPizzas/productoSimples/pizzaJamonYQueso.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarProductoSimple('Pizza Margarita Familiar', 45, '../../imagenesPizzas/productoSimples/pizzaMargarita.jpg')" class="btn btn-warning btn-sm">
                                        <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Pizza Margarita Familiar</td>
                                    <td>45 Bs</td>
                                    <td><img src="../../imagenesPizzas/productoSimples/pizzaMargarita.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarProductoSimple('Pizza Peperoni Familiar', 45, '../../imagenesPizzas/productoSimples/pizzaPeperoni.jpg')" class="btn btn-warning btn-sm">
                                        <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Pizza Peperoni Familiar</td>
                                    <td>45 Bs</td>
                                    <td><img src="../../imagenesPizzas/productoSimples/pizzaPeperoni.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarProductoSimple('Coca Cola 2L', 12, '../../imagenesPizzas/productoSimples/coca2L.jpg')" class="btn btn-warning btn-sm">
                                          <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Coca Cola 2L</td>
                                    <td>12 Bs</td>
                                    <td><img src="../../imagenesPizzas/productoSimples/coca2L.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarProductoSimple('Fanta Naranja 2L', 12, '../../imagenesPizzas/productoSimples/fanta2L.jpg')" class="btn btn-warning btn-sm">
                                          <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Fanta Naranja 2L</td>
                                    <td>12 Bs</td>
                                    <td><img src="../../imagenesPizzas/productoSimples/fanta2L.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>                             
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Combos-->
                    <div class="modal fade" id="modalCombo" tabindex="-1" role="dialog" aria-labelledby="modalCombo" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                            <h4 class="modal-title">Seleccione un Combo</h4>
                          </div>
                          <div class="modal-body">
                            <table id="tablaTodosLosPedidos" class="table table-bordered table-striped table-sm">
                              <thead>
                                  <tr>
                                    <th>Opcion</th>                                    
                                    <th>Nombre</th>                                  
                                    <th>Precio</th>
                                    <th>Imagen</th>                                                                   
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarCombo('Combo Pizza Jamon y Queso con Coca Cola 2L', 57, 1, '../../imagenesPizzas/combos/comboPizzaJamonYQuesoMasCoca2L.jpg')" class="btn btn-warning btn-sm">
                                        <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Combo Pizza Jamon y Queso con Coca Cola 2L</td>
                                    <td>57 Bs</td>
                                    <td><img src="../../imagenesPizzas/combos/comboPizzaJamonYQuesoMasCoca2L.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button type="button" data-dismiss="modal" onclick="agregarCombo('Combo Pizza Jamon y Queso con Coca Cola 2L', 102, 2, '../../imagenesPizzas/combos/combo2PizzasMasFanta2L.jpg')" class="btn btn-warning btn-sm">
                                        <i class="fa fa-plus"></i>
                                      </button>                                
                                    </td>
                                    <td>Combo Pizza Margarita y Pizza Peperoni con Fanta 2L</td>
                                    <td>102 Bs</td>
                                    <td><img src="../../imagenesPizzas/combos/combo2PizzasMasFanta2L.jpg" style="width: 150px; background-color: white; border: 1px solid #DDD; padding: 5px;"></td>
                                  </tr>                                                              
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                            
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Modal Metodo de Pago-->
                    <div class="modal fade" id="modalMetodoPago" tabindex="-1" role="dialog" aria-labelledby="modalMetodoPago" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                            <h4 class="modal-title">Seleccione su Metodo de Pago</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Numero de Orden:</label>
                              <input type="text" readonly class="form-control" name="numeroOrden2" id="numeroOrden2">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Nombre del cliente:</label>
                              <input type="text" readonly class="form-control" name="cliente2" id="cliente2">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Monto a pagar:</label>
                              <input type="text" readonly class="form-control" name="montoAPagar" id="montoAPagar">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <button class="btn btn-primary" type="button" id="btnPagarEnEfectivo"><i class="fa fa-save"></i> Pagar En Efectivo</button>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <button class="btn btn-primary" type="button" id="btnPagarConTargeta"><i class="fa fa-save"></i> Pagar Con Targeta</button>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                            
                          </div>
                        </div>
                      </div>
                    </div>  

                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    
  <!--Fin-Contenido-->

<?php
  require 'footer.php';
?>

<script type="text/javascript" src="../scripts/main.js"></script>


