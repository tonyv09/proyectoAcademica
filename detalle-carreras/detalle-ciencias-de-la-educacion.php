<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Departamento de Educacion</title>

     <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

  <link href="../css/estilos-extras.css" rel="stylesheet"> 
    
    <!-- Custom Fonts -->
    <link href="../css/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

        <!-- Navigation -->
<nav class="navbar navbar-inverse bg-inverse  navbar-toggleable-sm sticky-top mt-1 " >

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <a class="navbar-brand btn btn-outline-azulverdoso" href="../">
    Inicio
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
    
  
      <div class=" d-flex   navbar-nav  text-center justify-content-around mr-auto ml-auto">
  <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/carreras.html">Carreras</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/inscripciones.php">Inscripciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/formatos.php">Formatos</a>
 <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/tramites.php">Tramites</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/graduaciones.php">Graduaciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="../acceso-publico/enlaces.php">Enlaces de interes</a>    </div>
 
</div>  
</nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <h1 class="page-header">
                 <span class="fa-stack fa-1x">
                              <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                              <i class="fa fa-leaf fa-stack-1x fa-inverse"></i>
                              </span>
                Departamento de Ciencias de la Educacion
                </h1>
            </div>
        </div>
        <!-- /.row -->
                <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <img class="img-responsive" src="../images/educacionportada.jpg"  width="100%" height="80%" alt="">
            </div>
        </div>

        <div class="row">
      <!-- Nav tabs -->
                  <div class="col-lg-12 col-sm-12 mb-3">
                <h2 class="page-header">
<span class="fa-stack fa-1x">
                              <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                              <i class="fa fa-university fa-stack-1x fa-inverse"></i>
                        </span> 
                Carreras</h2>
            </div>
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active btn btn-gray" data-toggle="tab" href="#basica" role="tab" onclick="educacion_ocultar('area_iframe_basica','area_iframe_biologia','area_iframe_ingles','area_iframe_matematica','area_iframe_parvularia','area_iframe_profesionalizacion','area_iframe_trabajo_social')" ><i class="fa fa-calculator"></i>Basica <br> &nbsp;&nbsp;&nbsp;</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-gray " data-toggle="tab" href="#matematica" role="tab" onclick="educacion_ocultar('area_iframe_matematica','area_iframe_basica','area_iframe_biologia','area_iframe_ingles','area_iframe_parvularia','area_iframe_profesionalizacion','area_iframe_trabajo_social')"><i class="fa fa-suitcase"></i>Matematica <br> &nbsp;&nbsp;&nbsp;</a>
  </li>
   <li class="nav-item">
    <a class="nav-link  btn btn-gray" data-toggle="tab" href="#parvularia" role="tab" onclick="educacion_ocultar('area_iframe_parvularia','area_iframe_matematica','area_iframe_basica','area_iframe_biologia','area_iframe_ingles','area_iframe_profesionalizacion','area_iframe_trabajo_social')"><i class="fa fa-calculator"></i>Parvularia <br> &nbsp;&nbsp;&nbsp;</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-gray " data-toggle="tab" href="#biologia" role="tab" onclick="educacion_ocultar('area_iframe_biologia','area_iframe_parvularia','area_iframe_matematica','area_iframe_basica','area_iframe_ingles','area_iframe_profesionalizacion','area_iframe_trabajo_social')"><i class="fa fa-suitcase"></i>Biologia <br> &nbsp;&nbsp;&nbsp;</a>
  </li> <li class="nav-item">
    <a class="nav-link  btn btn-gray" data-toggle="tab" href="#ingles" role="tab" onclick="educacion_ocultar('area_iframe_ingles','area_iframe_biologia','area_iframe_parvularia','area_iframe_matematica','area_iframe_basica','area_iframe_profesionalizacion','area_iframe_trabajo_social')"><i class="fa fa-calculator"></i>Ingles <br> &nbsp;&nbsp;&nbsp; </a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-gray " data-toggle="tab" href="#trabajoSocial" role="tab" onclick="educacion_ocultar('area_iframe_trabajo_social','area_iframe_ingles','area_iframe_biologia','area_iframe_parvularia','area_iframe_matematica','area_iframe_basica','area_iframe_profesionalizacion')"><i class="fa fa-suitcase"></i>Licneciatura <br> en Trabajo Social</a>
  </li>
    <li class="nav-item">
    <a class="nav-link btn btn-gray " data-toggle="tab" href="#profesionalizacion" role="tab" onclick="educacion_ocultar('area_iframe_profesionalizacion','area_iframe_trabajo_social','area_iframe_ingles','area_iframe_biologia','area_iframe_parvularia','area_iframe_matematica','area_iframe_basica')"><i class="fa fa-suitcase"></i>Licneciatura en Ciencias de la Educacion  para la profesionalizacion <br> de Educacion basica para los ciclos primero y segundo</a>
  </li>
</ul>

     </div>

<!-- Tab panes -->
<div class="tab-content">

  <div class="tab-pane active text-justify" id="basica" role="tabpanel">
  <br>

                                         <h4>Descripcion</h4>
                        <p>
El Profesorado en Educación Básica para Primero y Segundo Ciclos está diseñado para formar maestros/as con capacidad científica, técnica, pedagógica y ética, para el ejercicio profesional de la docencia en el nivel de educación básica para primero y segundo ciclos, los cuales trabajarían con niños y niñas entre 7 y 12 años.
</p>
<p>
Esta especialidad se ofrece en seis ciclos, con una duración mínima de tres años, con un total de 23 asignaturas, en cuyo desarrollo gradual se contemplan tres componentes que se articulan simultáneamente
desde el inicio hasta el final del plan de estudios.
</p>
<p>
El primero de ellos tiene como propósito la formación general, común a todos los profesorados y se tratará en 9 cursos; un segundo componente está referido a la formación especializada, que centra su interés en el dominio de los contenidos curriculares y los conocimientos específicos de estrategias didácticas, necesario para su desempeño docente; este componente se desarrolla en 9 cursos; y un tercer componente que corresponde a la práctica docente, en la que se observará y reflexionará las situaciones reales de enseñanza-aprendizaje del nivel de educación básica para primero y segundo ciclo.</p>

<h4>PERFIL DEL PROFESIONAL</h4>
<p>Uno de los desafíos que se presenta hoy en torno a la
formación docente inicial es la necesidad y posibilidad
de resignificar la profesión docente, volver a pensarla y
concebirla, revisarla de manera de garantizar desempe-
ños adecuados en diferentes contextos y en atención a
sujetos singulares y prácticas sociales y culturales diver-
sas que nos presenta la próxima década. El/la docente
que se quiere formar en este nuevo diseño curricular
recupera las concepciones que plantean la docencia
como:</p>
<ul>
  <li><p>práctica de mediación cultural reflexiva y crítica,</p></li>
  <li><p>trabajo profesional institucionalizado y </p></li>
  <li><p>práctica pedagógica.</p></li>
</ul>
<p>Por una parte, se concibe la docencia como
práctica de mediación cultural reflexiva y crítica, caracte-
rizada por la capacidad para contextualizar las interven-
ciones de enseñanza en pos de encontrar diferentes y
mejores formas de posibilitar los aprendizajes de los/as
alumnos/as y apoyar procesos democráticos en el inte-
rior de las instituciones educativas y de las aulas, a partir
de ideales de justicia y de logro de mejores y más dignas
condiciones de vida para todos/as los/as alumnos/as.
</p>

<h4>Título a otorgar :</h4>
<p>Profesor o Profesora de Educación Básica para Primero y Segundo Ciclos
</p>
<h4>DURACIÓN DE LA CARRERA:</h4>

<p>3 años = seis (6) ciclos
                        </p>


                        
                          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="page-header">

                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensum basica</h2>
            </div>
</div> 
   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_basica" name="mostrar_basica" onclick="insertar_iframe('P10402')">Mostrar pensum</button>
</div>

 </div>
    
    <div class="tab-pane text-justify" id="matematica" role="tabpanel">
  <br>


                <h4>Descripcion</h4>
                        <p>La carrera de Profesorado en Matemática para tercer ciclo de Educación básica y Educación Media, permite capacitar al profesional dentro  la  realidad educativa nacional, para que contribuya a fomentar el aprendizaje de la Matemática como ente renovador en la disciplina,  adquiriendo  una  adecuada  formación  docente  e investigativa, lo que permitirá una mejor comprensión del proceso enseñanza aprendizaje de la Matemática.</p>
<h4> PERFIL DEL PROFESIONAL</h4>  
<p>Se espera que el egresado(a) busque constantemen-
te para sí mismo y para sus estudiantes una formación
humana integral que permita el desarrollo pleno de sus
capacidades, concibiendo como objetivo de su labor do-
cente la formación de una persona solidaria, pensante,
reflexiva, crítica y transformadora de su propia realidad.
Las competencias que definen su perfil son las siguientes:
</p>

<ul>
  <li><p>Promover el uso de los conocimientos y métodos que
fomentan el desarrollo del pensamiento lógico mate-
mático, para analizar situaciones y resolver problemas
del ámbito abstracto, aplicada a la vida cotidiana y de
la realidad en general.</p></li>
<li><p>
  Razonar sistemáticamente, mediante la aplicación de
esquemas de pensamiento lógico y métodos de demos-
tración propios de la matemática, para argumentar apro-
piadamente en el ámbito académico y en la vida diaria.

</p></li>

<li><p>Hacer adecuaciones curriculares y actividades docen-
tes para adaptarlas al nivel de desarrollo cognitivo y
psicológico de las y los alumnos y a la realidad educativa que le toque enfrentar.</p></li>
<li><p>Diseñar situaciones didácticas que permitan ejercitar
el análisis, la resolución de problemas, el uso del razonamiento 
deductivo e inductivo, la particularización y la
abstracción, para contribuir al desarrollo del pensamiento lógico,
 creativo, reflexivo y crítico de sus estudiantes.</p></li>

</ul>
                       <h3>DURACIÓN DE LA CARRERA:</h3>


<h4>Título a otorgar :</h4>
<p>Profesor o Profesora en Matemática para Tercer Ciclo de Educación Básica y
Educación Media
</p>
<h4>DURACIÓN DE LA CARRERA:</h4>

<p>3 años = seis (6) ciclos
                        </p>

                        
                          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="page-header">

                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensum matematica</h2>
            </div>
</div>
            <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_matematica" name="mostrar_matematica" onclick="insertar_iframe('P70923')">Mostrar pensum</button>
</div>
</div>

  <div class="tab-pane  text-justify" id="parvularia" role="tabpanel">
  <br>


   <h4>Descripcion</h4>
   <br>
<p>
Se espera que el estudiantado al finalizar el Profesorado Educación Inicial y Parvularia logre
las siguientes competencias:
</p>
<ul>
  <li> <p> Aplicar teorías y enfoques recientes que ayuden a fundamentar las áreas de la formación de inicial
y parvularia.</p> </li>
  <li><p>Aplicar la teoría y metodología curricular de la formación inicial y parvularia que orienten
acciones educativas de diseño, ejecución y evaluación.</p> </li>
  <li><p>Comprometerse y responsabilizarse con el desarrollo personal y profesional en forma
permanente.</p></li>
  <li><p>Desarrollar habilidades comunicativas como parte integral de la formación personal y
profesional.</p></li>
  <li><p>Aplicar estrategias metodológicas que fortalezcan la inclusión, los derechos de la niñez y la atención
a la diversidad.</p></li>
  <li><p>Orientar y facilitar procesos de cambio en la comunidad con acciones educativas de carácter
interdisciplinario.</p></li>
  <li><p>Aplicar estrategias metodológicas lúdicas y placenteras con enfoque globalizador en
educación infantil</p></li>
  <li> <p>Seleccionar y elaborar recursos educativos utilizando materiales reciclables y del medio
ambiente atendiendo a cada etapa evolutiva y a la diversidad socio- cultural.</p> </li>
  <li><p>Desarrollar el pensamiento lógico, crítico y creativo de las niñas y los niños para la resolución
de problemas de la vida diaria.</p></li>
<li>Diseñar, implementar y evaluar procesos de aprendizaje que integren a personas con
discapacidad.</li>
<li> <p> Seleccionar, utilizar y evaluar las tecnologías de la comunicación e información como recurso de
enseñanza y aprendizaje.
</p></li>
<li><p>Investigar y generar innovaciones en distintos ámbitos del sistema educativo.</p></li>
<li><p>Promover el desarrollo en educación en valores, equidad de género, medio ambiente, formación
ciudadana, democracia y cultura de paz</p></li>
</ul>
<br>
<h4>PERFIL DEL PROFESIONAL QUE SE
PRETENDE FORMAR</h4>
<p>
A lo largo de la formación docente, el profesional de educación inicial y parvularia desarrollará características profesionales y personales significativas para la atención educativa a la niñez, en vínculo con la familia y la comunidad.Estas características se han agrupado en tres grandes apartados: conocer, hacer, ser.
</p>

  <em>Conocer</em>
  <p>En esta dimensión se estima el dominio de hechos, conceptos, enfoques, modelos, teorías, convenios, legislaciones y todo el acervo cultural y científico que permita al profesional comprender y analizar procesos, conductas y acciones de las personas e instituciones con las cuales estará desempeñándose.</p>

    <em>Saber hacer</em><p>Comprende el dominio de procedimientos,
habilidades, destrezas, técnicas y todas aquellas acciones que posibiliten al profesional intervenir en
situaciones que son de su competencia, desde la labor directa con niños y niñas de 0 a 7 años hasta aquellas actividades que deba llevar a cabo con la familia y la comunidad.</p>

<em>Características de personalidad (ser y convivir)</em>.<p> Se sitúan aquí los valores, actitudes, cualidades que le potenciarán el trabajo con la infancia y con los diferentes miembros de la familia y la comunidad. Esta última dimensión constituye un componente fundamental en el perfil del profesional que merece especial atención. Tomando en cuenta los cuatro pilares de la educación propuestos por la UNESCO 6 , y descritos anteriormente, se plantea el siguiente perfil de salida del profesorado y
la licenciatura de educación inicial y parvularia.

</p>
<h4>Objetivos de la Carrera</h4>
<p>
  <ul>
    <li><p>Analizar la relevancia de la educación en la niñez y el rol de la persona educadora en esta etapa,
con el fin de valorar su incidencia en el desarrollode la personalidad infantil.</p></li>
    <li><p>Desarrollar actitudes críticas, profesionales,éticas, investigativas y cualidades de
personalidad equilibrada, necesarias para orientar el proceso educativo infantil. </p></li>
    <li><p>Promover y facilitar, desde una perspectiva
integradora, estrategias educativas para el trabajo con niñez de 0 a 7 años de edad en sus
dimensiones cognitiva, emocional, psicomotora
y social.</p></li>
    <li><p>Identificar la diversidad de modalidades de atención educativa de niñez de 0 a 7 años de edad, para favorecer el desarrollo integral de la niñez.</p></li>
    <li><p>Propiciar aprendizajes significativos con un enfoque globalizador en ambientes que favorezcan el desarrollo integral del niño y la niña, reconociendo y estimulando las singularidades
educativas, la equidad de género y el respeto a los derechos humanos.</p></li>
<li><p>Identificar los factores de riesgo que amenazan el desarrollo integral infantil, con el fin de prevenir y reducir estos efectos en la infancia.
</p></li>
<li><p>Indagar las diversas etapas del desarrollo evolutivo de la niñez de 0 a 7 años, períodos significativos, etapas de aprendizaje y estrategias didácticas, para favorecer la estimulación en
cada período de edad de la niñez.</p></li>
  <li><p>Orientar, mediante un trabajo colaborativo, a familias, centros educativos y comunidad, en los
procesos educativos y de desarrollo de la niñez de 0 a 7 años, con el fin de establecer vínculos de cooperación para la mejora de la calidadeducativa.</p></li>
 <li><p>Innovar y mejorar la labor educativa en el nivel de inicial y parvularia de 0 a 7 años, a través de
la reflexión-acción de la práctica docente.</p></li>
  </ul>
</p>
<h4>Título a otorgar :</h4>
<p>Profesor o Profesora en Educación Inicial y Parvularia
</p>
<h3>DURACIÓN DE LA CARRERA:</h3>

<p>3 años = seis (6) ciclos
                        </p>



<!--***********************************************************-->
                          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="page-header">

                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensum Profesorado y Licenciatura en Educación Inicial y Parvularia</h2>
            </div>
</div>
   



   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_parvularia" name="mostrar_parvularia" onclick="insertar_iframe('parv1')">Mostrar pensum</button>
</div>
         
</div>
 
  <div class="tab-pane  text-justify" id="biologia" role="tabpanel">
  <br>

<h4>PERFIL DEL PROFESIONAL</h4>
<P>
  Las competencias que definen el perfil del egresado se
agrupan en cinco áreas:
<ol><li>Habilidades intelectuales específicas</li>
     <ul>
       <li><p>Poseer el hábito de la lectura y capacidad de comprensión de lo que lee para valorarlo
críticamente, relacionándolo con la vida cotidiana y con su práctica profesional. </p></li>
     <li><p>
       Explicar sus ideas con claridad, sencillez y corrección en forma oral y escrita adaptándose
al desarrollo y características culturales de los alumnos.
     </p></li>
     <li><p> Ser capaz de orientar a sus alumnos para que adquieran la capacidad de analizar situaciones y
resolver problemas.</p></li>
<li><p>Tener disposición y capacidades adecuadas para la investigación científica, y aplicar esas
capacidades para mejorar los resultados de su labor educativa.</p></li>
     </ul>
<li>Dominio de los objetivos y los contenidos de la educación del Tercer Ciclo y del Bachillerato</li>
  <ul>
    <li><p>Conocer los propósitos, los contenidos y el enfoque de la enseñanza aprendizaje de la asignatura que
imparte, para lograr los objetivos generales de la educación en estas áreas.</p></li>
    <li><p> Tener una formación científica sólida de este nivel para manejar con fluidez y seguridad los temas
incluidos en los programas de estudio y reconocer la secuencia de los contenidos educativos.
</p></li>
    <li><p> Saber establecer una correspondencia adecuada entre la naturaleza y grado de complejidad de los
contenidos educativos con los procesos cognitivos y el nivel de desarrollo de sus alumnos.
</p></li>
  </ul>
<li>Competencia didácticas</li>
<ul>
  <li><p>Saber diseñar, organizar y poner en práctica estrategias y actividades didácticas, adecuadas a
las necesidades, intereses y formas de desarrollo de los estudiantes.</p></li>
  <li><p>Identificar necesidades especiales en el aprendizaje de sus alumnos, atenderlos y aplicar
las estrategias didácticas adecuadas para estimularlos y asegurar el éxito.</p></li>
  <li><p>Conocer y aplicar diversas estrategias de evaluación que le permitan valorar efectivamente
el aprendizaje de sus alumnos y la calidad de su desempeño docente y así modificar, si es
necesario, los procesos didácticos que aplica.</p></li>
  <li><p>Tener la capacidad de establecer un ambiente de trabajo que favorezca la confianza, autoestima,
respeto, disciplina, creatividad, curiosidad y satisfacción del estudiante para el estudio.</p></li>
  <li><p>Competencias científicas Se considera, que para estar en consonancia con las competencias que se esperan en tercer ciclo y educación media, se retomen las mismas con otra dimensión,
orientada al quehacer del docente en el aula.</p></li>
  <li><p>Comunicación de la información con lenguaje científico.</p></li>
  <li><p>La comunicación es parte esencial del trabajocientífico, ya que permite adquirir y producir
información representada a través de tablas, gráficos, modelos simbólicos y verbales que
dan precisión, validez y universalidad.</p></li>
  <li><p>El uso de procedimientos científicos tales como la indagación, clasificación, investigación,
análisis y otros, permiten resolver problemas de la vida cotidiana, científicos y tecnológicos
y facilitan una mejor comprensión de la naturaleza de la ciencia y la actividad científica
como una acción humana.</p></li>
  
</ul>
<li>Identidad profesional y ética.</li>
<ul>
  <li><p>Ejercer su actividad profesional dentro de un marco de responsabilidad, honestidad, respeto y
aprecio a la dignidad humana, justicia, libertad, igualdad, democracia, solidaridad, tolerancia y
apego a la verdad.</p></li>
  <li><p>Asumir la profesión como una carrera de vida y de servicio, para contribuir a resolver los
problemas del sistema educativo salvadoreño. Además conocer los deberes y derechos para el
mejoramiento de la capacidad profesional.</p></li>
  <li><p>Valorar el trabajo en equipo como un medio para la formación continua y el mejoramiento de la
institución, y tener actitudes favorables para la cooperación y las relaciones afectuosas con sus
colegas.</p></li>
</ul>
<li>Capacidad de percepción y respuesta a las condiciones sociales del entorno de la institución.
</li>
<ul>
  <li><p>Apreciar y respetar la diversidad cultural y étnica del país como un componente valioso de la
nacionalidad, y trasmitir esos sentimientos a sus alumnos para fomentar el amor a su país.</p></li>
  <li><p>Reconocer los principales problemas que enfrenta la comunidad en la que labora y tener
la disposición de contribuir a la solución en forma personal o buscando ayuda. Además, asumir y
promover el uso racional de los recursos naturales y la protección del medio ambiente.</p></li>
  <li><p>Valorar la función educativa de la familia, y relacionarse con los padres y madres de los
alumnos de manera receptiva, colaborativa y respetuosa y estimularlos para que juntos
participen en la formación de los alumnos.</p></li>

</ul>
</ol>
<h4>Título a otorgar :</h4>
<p>Profesorado en Biología para Tercer Ciclo de Educación Básica
y Educación Media.
</p>
<h3>DURACIÓN DE LA CARRERA:</h3>

<p>3 años = seis (6) ciclos
                        </p>




                          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="page-header">

                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensum biologia</h2>
            </div>
</div>


   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_biologia" name="mostrar_biologia" onclick="insertar_iframe('bio1')">Mostrar pensum</button>
</div>


         </div>

   <div class="tab-pane  text-justify" id="ingles" role="tabpanel">
  <br>


   <h4>Descripcion</h4>
                        <p>
   <h3> PARA TERCER CICLO DE EDUCACIÓN BÁSICA Y EDUCACIÓN MEDIA (PLAN MINED)</h3>
<p>
Este currículo está estructurado en seis ciclos con un total de 22 asignaturas. Contiene tres áreas: Area de Formación General Básica, Area de Formación Especializada y Area de Práctica Docente e Investigación Educativa.</p>

<h4>OBJETIVOS DEL PROFESIONAL</h4>
<ul><li>
  Formar profesionales competentes en la enseñanza
del Idioma Inglés, en Tercer Ciclo de Educación
Básica y Educación Media, con una concepción
crítica y propositiva, capaz de contribuir al proceso
del desarrollo social, educativo, científico, tecnológico
y cultural del país, desde una perspectiva humanista.
</li>
<li>Responder a las necesidades de especialización
profesional para la enseñanza del inglés en
Educación Básica y Educación Media.</li>
</ul>

<h3>MISIÓN DEL DEPARTAMENTO DE IDIOMAS EXTRANJEROS:</h3>
<p>
Formar profesionales con una concepción crítica y propositiva, capaces de contribuir al proceso de desarrollo social, educativo, cultural, científico, tecnológico y de coadyuvar a la solución de los problemas socio-políticos del país desde una perspectiva humanística en el campo de aprendizaje y enseñanza de los idiomas extranjeros.
</p>
<h4>Título a otorgar :</h4>
<p>Profesorado en Idioma Inglés para Tercer Ciclo de Educación Básica y Educación Media</p>
<h3>DURACIÓN DE LA CARRERA:</h3>

<p>3 años = seis (6) ciclos
                        </p>



                          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="page-header">

                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensum ingles</h2>
            </div>
</div>
         
   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_ingles" name="mostrar_ingles" onclick="insertar_iframe('P10430')">Mostrar pensum</button>
</div>

  </div>

  <div class="tab-pane text-justify" id="trabajoSocial" role="tabpanel">


<h4>Descripcion</h4>
                        <p>
                        La formación de Técnicos en Trabajo Social era función de la Escuela de Trabajo Social a nivel nacional, luego la Licenciatura en Trabajo Social en la UES nace a iniciativa del personal docente de la Escuela de Trabajo Social y se concretiza por medio de un convenio entre el Gobierno de la Republica de El Salvador a través del Ministerio de Educación y la Universidad de El Salvador, firmado el 20 de mayo de 1999, nace como una carrera en nuestra Universidad, siendo a partir de ese momento la Licenciatura en Trabajo Social como parte de la Escuela de Ciencias Sociales de La Facultad de Ciencias y Humanidades.</p>
<h4>OBJETIVO</h4>
<p>
Formar profesionales en Trabajo Social, con fundamentación humanista, teórica técnica-metodológica con un marco axiológico solido que contribuya al desarrollo de las potencialidades e iniciativas de las personas, grupos y sectores poblaciones que posibiliten la construcción de opciones y alternativas tendientes a la promoción y transformación de la realidad.</p>
<br>
<h4>
TIEMPO DE DURAICON DE LA CARRERA
</h4>
<p>5 años (10 ciclos)</p>

<h4>GRADO Y TITULO QUE SE OTORGA</h4>

<p>LICENCIADO(A) EN TRABAJO SOCIAL</p>




    



            <div class="row">
            <div class="col-lg-12 col-sm-12">
            <h2 class="page-header">
                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

                Pensumtrabajo social</h2>
            </div>
            </div>
   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_trabajo_social" name="mostrar_trabajo_social" onclick="insertar_iframe('L10439')">Mostrar pensum</button>
</div>

  </div>

    <div class="tab-pane text-justify" id="profesionalizacion" role="tabpanel">
<h4>Descripcion</h4>
<p>
  La Educación vista como un componente del desarrollo ha de responder a las exigencias que sobre
  la vision de la nueva sociedad, presentan los diversos sectores preocupados por la solucion
   de los problemas nacionales, regionales y mundiales.
</p>
<p>
  EL plan de Estudios de la Licenciatura en ciencias de la educacion para la profesionalizacion 
  de educacion basica para los ciclos primero y segundo, absorbe estos planteamientos para formar
  profesionales de la educacion y con ello, fortalecer la nueva vision mediante una respouesta 
  curriular consistente y eficaz. Pretende utilizar las herramientas tecnológicas como un metodo de enseñanza aprendizaje que facilite
  este proceso. En este sentido, se presenta una estructura de objetivos bajo esta modalidad y de los perfiles,
  que en su conjunto ofrece los elementos consecutivos capaces de contribuir a la formacion de autenticos profecionales de la 
  educacion salvadoreña
</p>

<h4>Objetivos de la Carrera</h4>
<p>
  <ul>
    <li>Proporcionar un aprendizaje significativo atravez 
     de las diferentes estrategias metodologicas basadas en el constructivismo.</li>
        <li>Contribuir a la formacion de profesionales con una concpcion cientifica de la educacion;
            consientes de su papel  activo en el proceso de cambio social.
        </li>
            <li>
              desarrollar competencias pedagógicas, de investigacion educativa, asistencia tecnica y profesional;
              en atencion a los requerimientos de las instituciones, organismos y agentes con funciones educativas
              en los profeionales en el area de la educacion.
            </li>
                <li>
                  Desarrollar profesionales en el ejercicio de la docencia, para la enseñanza  basica que promuevan 
                  el desarrollo armonico de la personalidad, de una disciplina de trabajo, organismos y agentes con funciones educativas
                  en los profesionales en el area de educacion.
                </li>
  </ul>
</p>

<h4>Perfil de Ingreso</h4>
<ul>
  <li>Profesor graduado en el ejercicio de la docencia</li>
      <li>Alto dominio en el ejercicio de la pratica docente en primero y segundo ciclos de Educacion Basica.</li>
          <li> Capaz de trabajar en equipos interdisciplinarios y multidisciplinarios de profesionales dadas las diversas
          especialidades de la ciencia que impartira atraves de los contenidos </li>
              <li>Someterse a un curso propedeutico para el dominio de herramientas del aula virutal.
              que sera impartido previo al inicio de la carrera.</li>
                  <li>Poseer disciplina de estudio, que le permita responder a la exigencia de la modalidad Semipresencial virtual</li>


</ul>
<h4>Perfil de Egreso</h4>
<ul>
  <li>Poseer las competencias cognitivas, actitudinales y procedimentales necesarias que le permitan
   ejercer la docencia en el nivel de especializacion.
  </li>
  <li>
    Comunicador del pensamiento cientifico propio, atraves de los diversos medios naturales 
    y tecnológicos de que dispone.
  </li>
      <li>
        Interesado en el fomento de la ciencia, el arte y la cultura.
      </li>
          <li>
            Respetuoso de las costumbres, tradiciones, principios y valores positivos de la comunidad.
          </li>
              <li>
                Reflexivo y critico atravez del acopio de los principios científicos que sustentan la educacion basica
              </li>
</ul>
<h4>Duracion de la carrera</h4>
<p>Cinco años (10 ciclos lectivos) mas trabajo de graduacion.</p>
<h4>Titulo a Otorgar</h4>
<p>Licenciado(a) en Ciencias de la Educación para la Profesionalizacion de la Educacion Basica para los ciclos primero y segundo</p>
            <div class="row">
            <div class="col-lg-12 col-sm-12">
            <h2 class="page-header">
                <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x text-gray-dark"></i>
                <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                        </span> 

               profesionalizacion</h2>
            </div>
            </div>

   <div class="row">
  <button type="button" class="btn btn-gray" id="mostrar_profesionalizacion" name="mostrar_profesionalizacion" onclick="insertar_iframe('prof1')">Mostrar pensum</button>
</div>
  </div>

</div>

        
        <hr>

        <!-- Footer -->
       
</div>

    <!-- /.container -->

   <section class="container" id="area_iframe_basica" name="area_iframe_basica" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 col-sm-12 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
         

    </div>
              <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_basica_col"   >
          
        </div>  
        </div>    
    </section>

       <section class="container" id="area_iframe_matematica" name="area_iframe_matematica" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
         

    </div>
                 <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_matematica_col"   >
          
        </div>  
        </div> 
    </section>
       <section class="container" id="area_iframe_parvularia" name="area_iframe_parvularia" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
         

    </div>
          
                  <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_parvularia_col"   >
          
        </div>  
        </div>
    </section>
       <section class="container" id="area_iframe_biologia" name="area_iframe_biologia" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
    </div>
          
                  <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_biologia_col"   >
          
        </div>  
        </div>
    </section>
       <section class="container" id="area_iframe_ingles" name="area_iframe_ingles" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
    </div>
                  <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_ingles_col"   >
          
        </div>  
        </div>
    </section>
       <section class="container" id="area_iframe_trabajo_social" name="area_iframe_trabajo_social" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
         

    </div>
          
        <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_trabajo_social_col"   >
          
        </div>  
        </div>

    </section>
       <section class="container" id="area_iframe_profesionalizacion" name="area_iframe_profesionalizacion" style="display: none" >
    <div class="row">
      <div class="col-md-3 col-sm-12 mb-5"><button type="button" class="btn btn-outline-primary"> PRE-REQUISITO </button></div>
            <div class="col-md-3 mb-5">
<button type="button" class="btn btn-outline-danger">SELECCIONADA</button>
            </div>
         

    </div>
        <div class="row">
        <div class="embed-responsive embed-responsive-16by9" id="area_iframe_profesionalizacion_col"   >
          
        </div>  
        </div>          
    </section>





<script src="../js/jquery-3.1.1.min.js" ></script>
<script src="js-carreras/generador-pensums-carreras.js"></script>

<script src="../js/tether-1.4.0.js"></script>

<script src="../js/bootstrap.min.js"></script>
<script>
  

$(document).ready(function(){
  educacion_ocultar('area_iframe_basica','area_iframe_biologia','area_iframe_ingles','area_iframe_matematica','area_iframe_parvularia','area_iframe_profesionalizacion','area_iframe_trabajo_social');

});


</script>
</body>

</html>
