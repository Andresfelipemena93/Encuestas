<div>
<?php include 'navbar.php'; ?>
</div>


<div  class="main-container">
<div id="main">

    <div class="container">
        <header class="header">
          <h1 id="title" class="text-center welcome">BIENVENID@</h1>
          <p id="description" class="description text-center"><strong>Por favor sólo selecciona 5 temas de los cuales te gustaría
            responder la encuesta
          </strong>
            
          </p>
        </header>



<div class="form-group survey-form">
            <p >
                ¿Qué le gustaría ver mejorado?
              <span class="clue">(Marque todo lo que corresponda)</span>
            </p>
      
            <label
              ><input
                name="prefer"
                value="front-end-projects"
                type="checkbox"
                class="input-checkbox"
              />Proyectos Front-end</label
            >
            <label>
              <input
                name="prefer"
                value="back-end-projects"
                type="checkbox"
                class="input-checkbox"
              />Proyectos Back-end</label
            >
            <label
              ><input
                name="prefer"
                value="data-visualization"
                type="checkbox"
                class="input-checkbox"
              />Visualización de datos</label
            >
            <label
              ><input
                name="prefer"
                value="challenges"
                type="checkbox"
                class="input-checkbox"
              />Retos</label
            >
            <label
              ><input
                name="prefer"
                value="open-source-community"
                type="checkbox"
                class="input-checkbox"
              />Comunidad Open Source</label
            >
            <label
              ><input
                name="prefer"
                value="gitter-help-rooms"
                type="checkbox"
                class="input-checkbox"
              />Las salas de ayuda de Gitter</label
            >
            <label
              ><input
                name="prefer"
                value="videos"
                type="checkbox"
                class="input-checkbox"
              />Videos</label
            >
            <label
              ><input
                name="prefer"
                value="city-meetups"
                type="checkbox"
                class="input-checkbox"
              />Encuentros en la ciudad</label
            >
            <label
              ><input
                name="prefer"
                value="wiki"
                type="checkbox"
                class="input-checkbox"
              />Wiki</label
            >
            <label
              ><input
                name="prefer"
                value="forum"
                type="checkbox"
                class="input-checkbox"
              />Forum</label
            >
            <label
              ><input
                name="prefer"
                value="additional-courses"
                type="checkbox"
                class="input-checkbox"
              />Cursos adicionales</label
            >
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="submit-button">
               <strong class="text-send">Continuar</strong> 
            </button>
          </div>
</div>
</div>
</div>
          <div><?php include 'footer.php'; ?></div>
       