<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
<!-- 
    Copyright 2013, i(dh)eas, Litigio Estratégico en Derechos Humanos A.C


    This file is part of bd(i).

    bd(i) is free software: you can redistribute it and/or modify


    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    bd(i) is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with bd(i). If not, see <http://www.gnu.org/licenses/>.


 -->

 
		<?php if ($idVictima>0) {
			foreach ($victimas['victimas'][$idVictima]['casosActor'] as $casoActor) {
			if ($casoId== $casoActor['casos_casoId'] ) {
			
				echo '<input type="hidden"  id="casoActorId" name="casoActorId" value="'.$casoActor['casoActorId'].'">';
				$casoVictimaActorId=$casoActor['casoActorId'];
			}else

				$casoVictimaActorId=0;
		}
		}
		?>
		<div class="twelve columns">
			<div class="four columns"> 	<!--Lista de victimas-->
					<div class="twelve columns espacioSuperior">
						<div class="six columns espacioSuperior">
							<form action="<?= base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/0/1/<?=$casoId?>" method="post">
								<center><input class="small button" value="Nueva víctima" type="submit"></center>
							</form>
						</div>
						<?php if ($idVictima>0) { ?>
							<div class="six columns espacioSuperior">
								<form action="<?= base_url(); ?>index.php/casos_c/eliminarVictima/<?=$idActo; ?>/<?=$victimas['victimas'][$idVictima]['victimaId']; ?>/<?=$casoVictimaActorId?>/<?=$casoId?>">
								<center><input class="small button" value="Eliminar víctima" type="submit"></center>
								</form>
							</div>
							<div class="twelve columns espacioSuperior">
								<form action="http://localhost/idheas/index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$idVictima; ?>/1/<?=$casoId?>" method="post">
									<center><input class="small button" value="Editar víctima" type="submit"></center>
								</form>
							</div>
						<?php }?>
					</div>
					
				<div class="twelve columns panel">
					<div class="four columns"> <b>Foto</b> </div>
					<div class="eight columns">	<b>Nombre</b> </div>
				</div>
				<div class="twelve columns lineasLista" >
					<?php if (isset($victimas['victimas']) && ($victimas['victimas']!=0)) {
						foreach ($victimas['victimas'] as $victima) { ?>
							 <a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$victima['victimaId']; ?>/0/<?=$casoId?>">
							 	<div class="twelve columns espacioInferior <?= $idVictima==($victima['victimaId']) ? "victimaSeleccionada" : "victimaNoSeleccionada" ;?>">
									<img class="four columns" style="min-width:70px !important; min-height:50px !important;" src="<?=base_url().$victima["foto"]; ?>" />
									<span class="eight columns"><?= $victima['nombre']." ".$victima['apellidosSiglas']?></span>
								</div>
							</a>
						<?php }
					} ?>
				</div>
			</div>	<!--Termina lista de victimas-->

			<!-- --------Comienza Formulario --------- -->
			<div class="eight columns"><!--Información general de la victima-->
				<div class="twelve columns">
				<form action="<?= ($idVictima>0) ? (base_url().'index.php/casos_c/editarVictima/'.$idActo.'/'.$victimas['victimas'][$idVictima]['victimaId']) : (base_url().'index.php/casos_c/guardarVictima/'.$idActo) ;?>" method="post" id="CasoForm" name="CasoForm"> 
					<fieldset>
						<legend>Información general</legend>
							<label>Victima</label><br/>
							<div class="twelve columns">


									<input type="hidden"  id="casoId" name="casoId" value="<?=$casoId?>">

									<input type="hidden"  id="casos_casoId" name="casos_casoId" value="<?=$casoId?>">

									<input type="hidden"  id="nameSeleccionado"  value="victimas_actorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

									<input type="hidden"  id="ValoresBotonCancelar" value="<?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['actorId']."*".$victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas']."*".$victimas['victimas'][$idVictima]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

									<input type="hidden" onchange="valorID()" name="victimas_actorId" id="victimas_actorId" value="<?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['actorId'] : " " ;?>" >

								<div id="vistaActorRelacionado"  >

					                <?php if($idVictima>0){ ?>    

					                <input type="hidden" value="<?=$idVictima; ?>" name="victimas_victimaId" />

					                <img class="three columns" style="width:120px !important; height:90px !important;" src="<?= (isset($victimas['victimas'][$idVictima]['foto'])) ? base_url().$victimas['victimas'][$idVictima]['foto'] : " " ; ?>" />
									<div class="nine columns"><h5><?=(isset($victimas['victimas'][$idVictima]['nombre'])) ? $victimas['victimas'][$idVictima]['nombre']." "	 : " " ; ?><?= (isset($victimas['victimas'][$idVictima]['apellidosSiglas'])) ? $victimas['victimas'][$idVictima]['apellidosSiglas'] : "" ;?></h5></div> 
					                <?php }?>

								</div>

								<input type="button" class="small button" onclick="habilitarboton2()"  value="Agregar actor">
								<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">

							</div>
							<div class="twelve columns"> 
								<br /><label><b><h5>Estado de la víctima</h5></b></label>	<br />
								<select onkeyup="notasCatalogos(1, value+'EdoVictima','EstadoVictima',2)" name="victimas_estatusVictimaId" id="victimas_estatusVictimaId">
									<option></option>
									<?php if ($idVictima>0){
										foreach ($catalogos['estatusVictimaCatalogo'] as $estatus) { ?>
										<option value="<?= $estatus['estatusVictimaId'];?>" name='<?= $estatus['notas']; ?>' id="<?= $estatus['estatusVictimaId'];?>EdoVictima" onclick="notasCatalogos2('<?= $estatus['notas']; ?>','EstadoVictima',2)" onclick="notasCatalogos2('<?= $estatus['notas']; ?>','EstadoVictima','<?= $estatus['estatusVictimaId'];?>')" <?= ($victimas['victimas'][$idVictima]['estatusVictimaId']==$estatus['estatusVictimaId']) ? "selected=selected" : "" ;?> ><?= $estatus['descripcion'];?></option>
									<?php }
									}else{ 
										foreach ($catalogos['estatusVictimaCatalogo'] as $estatus) { ?>
										<option value="<?= $estatus['estatusVictimaId'];?>" onclick="notasCatalogos2('<?= $estatus['notas']; ?>','EstadoVictima',2)" onclick="notasCatalogos2('<?= $estatus['notas']; ?>','EstadoVictima','<?= $estatus['estatusVictimaId'];?>')" ><?= $estatus['descripcion'];?></option>
										<?php } 
									}?>
								</select>
									<div id="notasEstadoVictima"></div>
							</div>

							<div class="twelve columns">
								<br /><label>Comentarios sobre víctimas y perpetradores</label>	<br />
									 <textarea  placeholder="Escribir algun comentario"  rows="10" cols="100" name="victimas_comentarios" id="victimas_comentarios"  wrap="hard" ><?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['comentarios'] : "" ; ?></textarea>
							</div>

					<div class="eight columns">
						<input type="submit" value="Guardar" <?=(isset($idVictima) && ($idVictima>0)) ? " " : "disabled" ;?> class="small button"/>
					</div>
					<div class="four columns">
						<a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo;?>/<?=$idVictima;?>/0/<?=$casoId?>" class="small button">Cancelar</a>
					</div>
				</form>	
							<div class="twelve columns espacio">
								<br/><label>Perpetradores</label> <br/>

						            <table class="twelve columns">
						                <thead>
						                    <tr>
						                        <th>Apellido(s)</th>
						                        <th>Nombre(s)</th>
						                        <th>Institución/Organización</th>
						                        <th>Tipo perpetrador</th>
						                        <th>Accion(es)</th>
						                    </tr>
						                </thead>
						                <tbody>
											<?php if (isset($victimas['victimas'][$idVictima]['perpetradores'])) { ?>
						            			<?php foreach ($victimas['victimas'][$idVictima]['perpetradores'] as $key => $perpetrador) { ?>

														<?php foreach ($perpetrador['casosActor'] as $casoActor) {
																if ($casoId== $casoActor['casos_casoId'] ) {
																
																	$casoActorId=$casoActor['casoActorId'];
																	
																}else{
																	$casoActorId=0;
																}
															}
														?>
						                			<tr>
								                        <td><?=(isset($perpetrador['perpetradorId'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'] : ''; ?></td>
								                        <td><?=(isset($perpetrador['perpetradorId'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'] : ''; ?></td>
								                          <td><?=(isset($perpetrador['actorRelacionadoId'])&&($perpetrador['actorRelacionadoId']>0)) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$perpetrador['actorRelacionadoId']]['actorRelacionadoId']]['nombre'] : ''; ?></td>
								                        <td><?=(isset($perpetrador['tipoPerpetradorId'])&& isset($perpetrador['tipoPerpetradorNivel'])) ? $catalogos['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Catalogo'][$perpetrador['tipoPerpetradorId']]['descripcion'] : ''; ?></td>
								                        <td>
								                        	<div class="twelve columns espacioInferior"><input  style="margin-left: -20px;padding: 5px 20px 6px 20px" class="small button" value="Editar" onclick="ventanaPerpetradores('<?=$idActo;?>', '<?= $victimas['victimas'][$idVictima]['victimaId']?>', '<?= $perpetrador['perpetradorVictimaId'] ?>','<?=$casoId?>')" type="button"> </div>
								                        	<div class="twelve columns">
								                        		<form method="POST" action="<?= base_url(); ?>index.php/casos_c/eliminarPerpetrador/<?=$idActo; ?>/<?=$victimas['victimas'][$idVictima]['victimaId']; ?>/<?= $perpetrador['perpetradorVictimaId']; ?>/<?=$casoActorId?>/<?=$casoId?>">
								                        		<input  style="margin-left: -20px;"  class="small button" value="Eliminar" type="submit"> 
								                        		</form>
								                        	</div>
								                        </td>
						                    		</tr>
							            		<?php } ?>
											<?php } ?>
						                </tbody>
						            </table>
						            <div class="twelve columns"> 
											<div class="three columns push-nine" >
												<?php if ($idVictima>0) {?>
													<input class="tiny button" value="nuevo perpetrador" onclick="ventanaPerpetradores('<?=$idActo;  ;?>', <?= $victimas['victimas'][$idVictima]['victimaId']?>, 0,'<?=$casoId?>')" type="button">
												<?php }?>
											</div>
									</div>
							</div>

					</fieldset>
				</div>
			</div><!--Termina información general de la victima-->
<input type="button" class="small button" value="Guardar y Cerrar" onclick="cerrarVentana()">
<!-- --------Termina Formulario --------- -->
		</div>
	</body>	
</html> 
<!-- -->