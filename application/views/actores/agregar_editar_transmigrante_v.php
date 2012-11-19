<input type="hidden" id="tipoActorAE"  name="2"/>
<form action="<?=$action; ?>" method="post" enctype="multipart/form-data" id="menuForm" name="menuForm">
    

    <div class="three columns">
                <?php if(isset($datosActor)){ ?> 
                <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
                    <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
                <?php }?>


                 <label>Foto </label>
                    <input name="archivo" type="file" size="10" accept="image/*" />  
                <input type="hidden" <?= (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : "" ;?> name="actores_foto" />
    </div>

    <div class="nine columns">
            <?php if(isset($actorId)){ ?>
            <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
        <?php } ?>
    <input type="hidden" value="2" name="actores_tipoActorId" />			
    <div id="Actores" >


    <fieldset>
    <legend>Información general</legend>
    <div class="six columns">

        <label for="nombre">Nombre</label>
        <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : ''); ?> required />

        <label for="apellidos">Apellidos</label>
                <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : ''); ?> required />

        <label for="alias">Alias</label>
                <input type="text" id="alias_alias" name="alias_alias" <?=(isset($datosActor['alias']['alias']) ? 'value="'.$datosActor['alias']['alias'].'"' : ''); ?> />

    </div>

    <div class="six columns">

    <div class="seven columns">
        <label for="genero">Género</label>
        <?php if(isset($datosActor['infoGralActor']['generoId'])) { ?>
                    <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 1){ echo 'checked="checked"'; }?> value="1" />Hombre
                    <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 2){ echo 'checked="checked"'; }?> value="2" />Mujer
                <?php } else { ?>
                    <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  checked="checked" value="1" />Hombre
                    <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="2" />Mujer
                <?php } ?>
    </div>

    <div class="five columns">
        <label for="edad">Edad</label>
        <select name="infoGralActor_edad" id="infoGralActor_edad">					
        <option  > </option>	
                    <?php if(isset($datosActor['infoGralActor']['edad'])){
                        for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                            <option value="<?=$i?>" <?=($datosActor['infoGralActor']['edad'] == $i) ? 'selected=selected' : '' ?>><?=$i?></option>
                        <?php endfor;
                    } else {
                        for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                            <option value="<?=$i?>"><?=$i?></option>
                        <?php endfor;
                    } ?>
        </select>
    </div>

    <label for="estadoCivil">Estado Civil</label>
    <span class="twelve columns" id="infoGralActor_estadoCivil_estadoCivilIdSelect">
    <select id="infoGralActor_estadoCivil_estadoCivilId" name="infoGralActor_estadoCivil_estadoCivilId"  >
    <option></option>
    <?php if(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])){
                    foreach($catalogos['estadosCivilesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['estadoCivilId']?>" <?=($datosActor['infoGralActor']['estadoCivil_estadoCivilId'] == $item['estadoCivilId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                    <?php endforeach;
                } else { ?>
                    <?php foreach($catalogos['estadosCivilesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['estadoCivilId']?>" > <?=$item['descripcion']?></option>
                    <?php endforeach; } ?>
    </select>
    <!--
    </span>
    <input id="BotonmasinfoGralActor_estadoCivil_estadoCivilId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
    <span id="TextoEspecial_infoGralActor_estadoCivil_estadoCivilId" class="Escondido twelve columns">
    </span>-->


    <label for="nacionalidadID">Nacionalidad</label>
        <select id="infoGralActor_nacionalidadIdSelect" name="infoGralActor_nacionalidadId">
            <option></option>
            <?php if(isset($datosActor['infoGralActor']['nacionalidadId'])){
                            foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?> <!--muestra todas las edades de 1 a 100-->
                                <option value="<?=$nacionalidad['nacionalidadId']; ?>" <?=($datosActor['infoGralActor']['nacionalidadId'] == $nacionalidad['nacionalidadId']) ? 'selected="selected"' : '' ; ?>> <?=$nacionalidad['nombre']; ?></option>
                            <?php endforeach;
                        } else {
                            foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?>
                                <option value="<?=$nacionalidad['nacionalidadId']; ?>"> <?=$nacionalidad['nombre'] ?></option>
                            <?php endforeach;
                        } ?>
        </select>


    <!--<input id="BotonmasinfoGralActor_nacionalidadId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
    <span id="TextoEspecial_infoGralActor_nacionalidadId" class="Escondido twelve columns">
    </span>-->

    </div>

    </fieldset>	<!--Termina información general-->

    <fieldset>
    <legend>Detalles</legend>
    <div class="six columns">


        <label for="hijos">Hijos</label>
        <span class="twelve columns" id="infoGralActor_hijosSelect">
        <select name="infoGralActor_hijos" id="infoGralActor_hijos" >						
        <option></option>
        <?php if(isset($datosActor['infoGralActor']['hijos'])){
        for($edad = 0; $edad <= 100; $edad++):?> <!--muestra todas las edades de 1 a 100-->
        <option value="<?=$edad?>" <?=($datosActor['infoGralActor']['hijos'] == $edad) ? 'selected="selected"' : '' ; ?>> <?=$edad; ?></option>
        <?php endfor;
        } else {
        for($edad = 0; $edad <= 100; $edad++):?><!--muestra todas las edades de 1 a 100-->
        <option value="<?=$edad?>"><?=$edad?></option>
        <?php endfor;
        } ?>
        </select>
        </span>

        <!--<input id="BotonmasinfoGralActor_hijos" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
        <span id="TextoEspecial_infoGralActor_hijos" class="Escondido twelve columns">
        </span>-->


        <label for="genero">¿Habla español?</label>
        <?php if(isset($datosActor['inofGralActor']['espaniol'])){ ?>
            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'Si') ? 'checked="checked"' : ''; ?> value="Si" />Si
            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'No') ? 'checked="checked"' : ''; ?> value="No" />No
        <?php } else { ?>
            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" checked="checked" value="Si" />Si
            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" value="No" />No
        <?php } ?>


        <label for="grupoIndigena">Grupo Indígena</label>
        <span class="twelve columns" id="infoGralActor_gruposIndigenas_grupoIndigenaIdSelect">
            <select name="infoGralActor_gruposIndigenas_grupoIndigenaId" id="infoGralActor_gruposIndigenas_grupoIndigenaId">
            <option></option>
            <?php if(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])){
            foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
            <option  value="<?=$item['grupoIndigenaId']?>" <?=($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'] == $item['grupoIndigenaId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
            <?php endforeach; } else { ?>
            <?php foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
            <option  value="<?=$item['grupoIndigenaId']; ?>"><?=$item['descripcion']; ?></option>
            <?php endforeach; } ?>
            </select>
        </span>
            <!--<input id="BotonmasinfoGralActor_gruposIndigenas_grupoIndigenaId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
        <span id="TextoEspecial_infoGralActor_gruposIndigenas_grupoIndigenaId" class="Escondido twelve columns">
        </span>-->



    </div>
    <div class="six columns">


    <label for="nivelEscolaridad">Nivel de Escolaridad</label>
    <select id="infoGralActor_escolaridadId" name="infoGralActor_escolaridadId">                        
        <option></option>
        <?php if(isset($datosActor['infoGralActor']['escolaridadId'])){
            foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
            <option  value="<?=$item['nivelEscolaridadId']; ?>" <?=($datosActor['infoGralActor']['escolaridadId'] == $item['nivelEscolaridadId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
        <?php endforeach;
        } else {
            foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$item['nivelEscolaridadId'] ?>"> <?=$item['descripcion']; ?></option>
        <?php endforeach;}?>    
    </select>

    </span>
    <!--<input id="BotonmasinfoGralActor_escolaridadId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
    <span id="TextoEspecial_infoGralActor_escolaridadId" class="Escondido twelve columns">
    </span>-->

    <label for="UltimaOcupacion">Última Ocupación</label>
    <select id="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" name="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId">                        
        <option></option>
        <?php if(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])){
            foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                <?php if($item['tipoActorId'] == 1){ ?>
                        <option onclick="notasCatalogos('<?=$item['notas']; ?>','notasUltimaOcupacion')" value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                     <?php } ?>
            <?php endforeach; } 
            else { ?>
                <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                    <?php if($item['tipoActorId'] == 1){ ?>
                        <option onclick="notasCatalogos('<?=$item['notas']; ?>','notasUltimaOcupacion')" value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
                    <?php } ?>
        <?php endforeach; } ?>
    </select>

    </span>
    <!--<input id="BotonmasinfoGralActor_ocupacionesCatalogo_ultimaOcupacionid" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
    <span id="TextoEspecial_infoGralActor_ocupacionesCatalogo_ultimaOcupacionid" class="Escondido twelve columns">
    </span> -->

    </div>


    </fieldset><!--Termina Detalles-->
    <fieldset>	
    <legend>Información Migratoria</legend>

    <div class="twelve columns">
    <fieldset>		
        <legend>Lugar de origen</legend>

        <!--Llamada a los filtros-->
		<?=$filtroPais;?>
    </fieldset>	<!--Termina lugar de origen-->									
    </div>

    <div class="twelve columns espacioSuperior">
    </div>
        <div class="six columns">

            <label for="paistrans">País de tránsito</label>
            <div id="infoMigratoria_paisTransitoIdSelect" class="twelve columns">
                <select name="infoMigratoria_paisTransitoId" id="infoMigratoria_paisTransitoId">
                <option></option>
                <?php if(isset($datosActor['infoMigratoria']['paisTransitoId'])){
                foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['paisId']?>" <?=($datosActor['infoMigratoria']['paisTransitoId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
                    <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
                <?php endforeach; } ?>
                </select>
                </div>
            <!--<input id="BotonmasinfoMigratoria_paisTransitoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />  
            <span id="TextoEspecial_infoMigratoria_paisTransitoId" class="Escondido twelve columns">
            </span>-->

            <!---motivo dl viaje -- -->


            <label for="intcrucepaistran">Intentos de cruce por el país de tránsito</label>
            <div id="infoMigratoria_intCruceTransitoSelect" class="twelve columns">
                <select name="infoMigratoria_intCruceTransito" id="infoMigratoria_intCruceTransito" >                       
                <option></option>
                <?php if(isset($datosActor['infoMigratoria']['intCruceTransito'])){
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['intCruceTransito'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
                <?php endfor;
                } else {
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
                <?php endfor;
                } ?>
                </select>
            </div>
            <!--<input id="BotonmasinfoMigratoria_intCruceTransito" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
            <span id="TextoEspecial_infoMigratoria_intCruceTransito" class="Escondido twelve columns">
            </span>-->
            <label for="expulpaistrans">Expulsiones del país de tránsito</label>
            <select name="infoMigratoria_expCruceTransito">                     
                <option > </option>
                <?php if(isset($datosActor['infoMigratoria']['expCruceTransito'])){
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['expCruceTransito'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
                <?php endfor;
                } else {
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
                <?php endfor;
                } ?>
            </select>
            <label for="motivoViaje">Motivo del viaje</label>
                <select name="infoMigratoria_motivoViajeId" id="infoMigratoria_motivoViajeId">
                <option></option>
                <?php if(isset($datosActor['infoMigratoria']['motivoViajeId'])){
                foreach($catalogos['motivoViaje'] as $key => $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['motivoViajeId']?>" <?=($datosActor['infoMigratoria']['motivoViajeId'] == $item['motivoViajeId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['motivoViaje'] as $item):?> <!--muestra los estados civiles-->
                    <option value="<?=$item['motivoViajeId']; ?>"><?=$item['descripcion']; ?></option>
                <?php endforeach; } ?>
                </select>
            <!--<input id="BotonmasinfoMigratoria_motivoViaje" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" /> 
            <span id="TextoEspecial_infoMigratoria_motivoViaje" class="Escondido twelve columns">
            </span>-->

            <label for="realizaViaje">Realiza el viaje</label>
            <input type="radio" name="infoMigratoria_realizaViaje" value="No acompanado" /> No acompañado
            <input type="radio" name="infoMigratoria_realizaViaje" value="Acompanado" /> Acompañado
        </div>

        <div class="six columns">

            <label for="paisdest">País destino</label>
                <select name="infoMigratoria_paisDestinoId" id="infoMigratoria_paisDestinoId">
                <option></option>
                <?php if(isset($datosActor['infoMigratoria']['paisDestinoId'])){
                foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['paisId']?>" <?=($datosActor['infoMigratoria']['paisDestinoId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
                    <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
                <?php endforeach; } ?>
                </select>
            <!--<input id="BotonmasinfoMigratoria_paisDestinoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
            <span id="TextoEspecial_infoMigratoria_paisDestinoId" class="Escondido twelve columns">	</span>-->


            <label for="intcrucespaisdets">Intentos de cruce al país destino</label>
                <select name="infoMigratoria_intCruceDestino" id="infoMigratoria_intCruceDestino" >
                    <?php if(isset($datosActor['infoMigratoria']['intCruceDestino'])){
                    for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                    <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['intCruceDestino'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
                    <?php endfor;
                    } else {
                    for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                    <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
                    <?php endfor;
                    } ?>
                </select>

            <label for="expulpaisdest">Expulsiones del país de destino</label>
            <div id="infoMigratoria_expCruceDestinoSelect">
                <select name="infoMigratoria_expCruceDestino" id="infoMigratoria_expCruceDestino">                      
                <option></option>
                <?php if(isset($datosActor['infoMigratoria']['expCruceDestino'])){
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['expCruceDestino'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
                <?php endfor;
                } else {
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
                <?php endfor;
                } ?>
                </select>
            </div>
            <!--<input id="BotonmasinfoMigratoria_expCruceDestino" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" /> 
            <span id="TextoEspecial_infoMigratoria_expCruceDestino" class="Escondido twelve columns">
            </span>-->

        <label for="tipoEstancia">Tipo de estancia</label>
        <select name="infoMigratoria_tipoEstanciaId" id="infoMigratoria_tipoEstanciaId">
            <option></option>
            <?php if(isset($datosActor['infoMigratoria']['tipoEstanciaId'])){ ?>
                <option value="1" <?=($datosActor['infoMigratoria']['tipoEstanciaId'] == 1) ? 'selected="selected"' : '' ; ?>>Corta estancia</option>
                <option value="2" <?=($datosActor['infoMigratoria']['tipoEstanciaId'] == 2) ? 'selected="selected"' : '' ; ?>>Larga estancia </option>
            <?php } else { ?>
                <option value="1" >Corta estancia</option>
                <option value="2" >Larga estancia</option>
             <?php } ?>
        </select>
        <!--<input id="BotonmasinfoMigratoria_tipoEstanciaId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
        <span id="TextoEspecial_infoMigratoria_tipoEstanciaId" class="Escondido twelve columns">
        </span>-->

        </div>

    </fieldset><!--Termina datos de nacimiento-->

    <fieldset>
        <legend>Comentarios</legend>
        <div class="twelve columns">
            <textarea  placeholder="Escribir algun comentario"  rows="10" cols="100" name="infoMigratoria_comentarios" id="infoMigratoria_comentarios" wrap="hard" >
                <?= (isset($datosActor['infoMigratoria']['comentarios'])) ? $datosActor['infoMigratoria']['comentarios'] : "" ;?>
            </textarea>
        </div>
    </fieldset>

    <!--Estos campos solo apareceran cuando el actor este relacionado con un caso-->
    <?php if (isset($relacionadoCaso)) {?>
        <div>


            <!--Inicia datos de nacimiento-->
            <fieldset>
                <legend>Datos de nacimiento</legend>
                            
                            <!--Llamada a los filtros-->
                            <?=$filtroPais;?>                               
                    
                         <div class="six columns">
                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <input type="text" id="fechaDeNacimientoIndividual" name="datosDeNacimiento_fechaNacimiento" <?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento']) ? 'value="'.$datosActor['datosDeNacimiento']['fechaNacimiento'].'"' : ''); ?> placeholder="AAAA-MM-DD" />
                        
                        </div>
            </fieldset>
            <!--Termina datos de nacimiento-->

            <!--Inicia Idientificación-->
            <fieldset>
                <legend>Identificación</legend>
                <div class="six columns">
                    <label>Tipo de Identificación</label>
                        <select name="infoMigratoria_tipoIdentificacionId" id="infoMigratoria_tipoIdentificacionId" >
                            <?php if (isset($datosActor['infoMigratoria']['tipoIdentificacionId'] )) { ?>

                                <option <?=($datosActor['infoMigratoria']['tipoIdentificacionId']==1) ? "selected=selected" : "" ;?> value="1">Credencial para votar</option>
                                <option <?=($datosActor['infoMigratoria']['tipoIdentificacionId']==2) ? "selected=selected" : "" ;?> value="2">Licencia de conducir</option>
                                <option <?=($datosActor['infoMigratoria']['tipoIdentificacionId']==3) ? "selected=selected" : "" ;?> value="3">Otro</option>
                                <option <?=($datosActor['infoMigratoria']['tipoIdentificacionId']==4) ? "selected=selected" : "" ;?> value="4">Pasaporte</option>
                                <option <?=($datosActor['infoMigratoria']['tipoIdentificacionId']==5) ? "selected=selected" : "" ;?> value="5">Visa</option>
                            <?php } else{ ?>
                                <option value="1">Credencial para votar</option>
                                <option value="2">Licencia de conducir</option>
                                <option value="3">Otro</option>
                                <option value="4">Pasaporte</option>
                                <option value="5">Visa</option>
                            <?php }?>
                        </select>
                </div>
                <div class="six columns">
                    <label>No. de Identificación</label>
                    <input type="text" name="infoMigratoria_numIdentificacion" id="infoMigratoria_numIdentificacion" value="<?= (isset($datosActor['infoMigratoria']['numIdentificacion'])) ? $datosActor['infoMigratoria']['numIdentificacion'] : " " ;?>">
                </div>

            </fieldset>
            <!--Termina Identificación-->

            <!--Inicial Información del contacto-->

            <fieldset>
                <legend>Información de contacto</legend>
                <div class="six columns"> <!--Primer mitad de información de contacto-->
                <label for="telefono">Teléfono</label>
                <input type="text" id="infoContacto_telefono" pattern="[0-9]+" name="infoContacto_telefono"  <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : ''); ?>  />
                <label for="infoContacto_telefonoMovil">Teléfono móvil</label>
                <input type="text" id="infoContacto_telefonoMovil" name="infoContacto_telefonoMovil" <?=(isset($datosActor['infoContacto']['telefonoMovil']) ? 'value="'.$datosActor['infoContacto']['telefonoMovil'].'"' : ''); ?> />
                </div><!--Termina primer mitad de la nformación de contacto--->
                <div class="six columns"><!--Segunda mitad de nformación de contacto---->
                <label for="infoContacto_correoE">Correo electrónico</label>
                <input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : ''); ?> />
                </div>  <!--Segunda mitad de nformación de contacto---->
            </fieldset>

            <!--Terminal Información del contacto-->


            <fieldset><!--Dirección-->
            <legend>Dirección</legend>
                <div id="pestania" data-collapse>
                    <h2 class="open">Dirección(es) </h2>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Tipo de dirección</th>
                                    <th>Ubicación</th>
                                    <th>Código Postal</th>
                                    <th>País</th>
                                    <th>Estado</th>
                                    <th>Municipio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($datosActor['direccionActor'])) {
                                    foreach ($datosActor['direccionActor'] as $key => $direccion) {?>
                                    <tr>
                                            <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
                                            <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
                                            <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
                                            <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
                                            <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
                                            <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
                                            <td><input type="button" class="tiny button"  value="Editar" onclick="nuevaDireccion('<?=$actorId?>','<?=$direccion['direccionId']?>')"/>
                                                <input type="button" value="Elminar" class="tiny button" onclick="eliminarDireccionActor('<?=$direccion['direccionId']?>','<?=$actorId?>','2')"/>
                                            </td>
                                    </tr>
                                    <?php }?>
                                <?php }?>
                            </tbody>
                        </table>
                            <input type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion('<?=$actorId?>','0')">
                    </div>
                </div>
            </fieldset> <!--Termina direcciones-->


        </div>
    <?php } ?>
    <!--Terminan los campos que solo apareceran cuando el actor este relacionado con un caso-->

        <div class="row espacioInferior espacioSuperior">
            <div class="nine columns">
                <input class="medium button" type="submit" value="Guardar" />
            </div>
            <div  class="three columns" >
                <input class="medium button" type="reset" value="Cancelar" onclick="pagInicial()" />
            </div>
        </div>
    </div>

    
    </div>


</form> 