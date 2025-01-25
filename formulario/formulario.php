

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Ingreso</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div id="page" class="site">
        <div class="container">
            <div class="form-box">
                <div class="progress"><br><br><br>
                <h2>Datos de Nuevo Ingreso</h2><br>
                    <ul class="progress-steps">
                        <li class="step active">
                            <span class="num"></span>
                            <p>Personales <br><span>25 secs to complete</span></p>
                        </li>
                        <li class="step ">
                            <span class="num"></span>
                            <p>Adicional <br><span>25 secs to complete</span></p>
                        </li>
                        <li class="step">
                            <span></span>
                            <p>Académicos<br><span>25 secs to complete</span></p>
                        </li>
                        <li class="step">
                            <span></span>
                            <p>Representante<br><span>60 secs to complete</span></p>
                        </li>
                        <li class="step">
                            <span></span>
                            <p>Documentación<br><span>60 secs to complete</span></p>
                        </li>
                    </ul>
                </div>
                <div>
                <form action=" " method="POST">
                    <div class="one form-step active">
                        <div class="bg-svg"></div>
                        <h2>Información Requerida</h2>
                        <div>
                            <label>Apellidos</label>
                            <input id="" name="" type="text" placeholder="Moncada Moncada">  <br>
                            <label>Nombres</label>
                            <input id="" name="" type="text" placeholder="Emilia Alejandra"> 
                        </div>
                        <div>
                            <label>Cédula de Identidad</label>
                            <input  id="" type="text" name="" placeholder="00.000.000">  
                        </div>
                        <div class="birth">
                            <label>Fecha de Nacimiento</label>
                            <div class="grouping">
                                <input type="text" patter="[0.9]*" name="day_inicio" velue="" min="1" max="31" placeholder="DD" >
                                <input type="text" patter="[0.9]*" name="month_inicio" velue="" min="1" max="12" placeholder="MM">
                                <input type="text" patter="[0.9]*" name="year_inicio" velue="" min="1990" max="2025" placeholder="YYYY">
                            </div>
                        </div>
                    </div>
                    <div class="two form-step">
                        <div class="bg-svg"></div>
                        <h2>Información Adicional</h2>
                        <div>
                            <label>Tipo de Sangre</label>
                            <input id="" name="" type="text" placeholder="O+">
                        </div>
                        <div>
                            <label>¿Es alergico a algún alimento? Y si es así favor indicar a cuál</label>
                            <input id="" name="" type="text" placeholder="">
                        </div>
                    </div>

                    <div class="three form-step">
                        <div class="bg-svg"></div>
                        <h2>Información Requerida</h2>
                        <div>
                            <label>Condición del Estudiante</label>
                            <select  id="" name="" required>
                                <option value="">Regular</option>
                                <option value="">Materia pendiente</option>
                                <option value="">Repitiente</option>
                            </select>
                        </div>
                        <div>
                            <label>Año a Cursar</label>
                            <select  id="" name="" name="" required>
                            <option value="">1ero</option>
                            <option value="">2do</option>
                            <option value="">3ero</option>
                            <option value="">4to</option>
                            <option value="">5to</option>
                            </select>
                        </div>
                        <div>
                        <label>Sección</label>
                            <select  id="" name="" required>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                            <option value="">D</option>
                            <option value="">E</option>
                            <option value="">F</option>
                            <option value="">U</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="four form-step">
                            <div class="bg-svg"></div>
                            <h2>Contacto del Representante</h2>
                        <div>
                            <label>Apellidos </label>
                            <input id="" type="" name="" placeholder="Moncada Moncada"><br>
                            <label>Nombre </label>
                            <input id="" type="" name="" placeholder="Emilia Alejandra">
                        </div>
                        <div>
                            <label>Cédula de Identidad</label>
                            <input id="c_ced"  type="text" name="c_ced" placeholder="00.000.000">
                        </div>
                        <div>
                            <label>Teléfono de contacto</label>
                            <input id="" name="" type="text" placeholder="0412-1111111">
                        </div>
                        <div>
                            <label>Correo Electrónico</label>
                            <input id="" name="" type="text" placeholder="a@gmail.com">
                        </div>
                    </div>

                    <div class="five form-step">
                        <div class="bg-svf"></div>
                        <h2>Documentos Requeridos</h2>
                        <div class="file-upload">
                            <label>1. Partida de Nacimiento</label>
                            <input type="file" class="archivo-file"  id="foto_documento" name="foto_documento" accept="image/*">
                        
                        </div>
                        <div class="file-upload">
                            <label>2. Histórico del Estudiante</label>
                            <input type="file" class="archivo-file" id="foto_documento"  name="foto_documento" accept="image/*">
                            
                        </div>
                        <div class="file-upload">
                            <label>3. Cédula de Identidad del Estudiante</label>
                            <input type="file" class="archivo-file" id="foto_documento"  name="foto_documento" accept="image/*">
                            
                        </div>
                        <div class="file-upload">
                            <label>4. Cédula de Identidad del Representante</label>
                            <input type="file" class="archivo-file" id="foto_documento"  name="foto_documento" accept="image/*">
                            
                        </div>
                        <div class="file-upload">
                            <label>5. Ficha de Inscripción</label>
                            <input type="file" class="archivo-file" id="foto_documento"  name="foto_documento" accept="image/*">
                            
                        </div>
                    </div>

                    <div class="btn">
                        <button type="button" class="btn back" id="muestra" disabled>Anterior</button>
                        <button type="button" class="btn siguiente" id="muestra">Siguiente</button>
                        <button type="submit" class="btn sub" id="muestra"><a href="../dashboard_coordinador.php">Enviar</a></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="form.js"></script>
</body>
</html>
