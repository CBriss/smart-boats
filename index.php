<!DOCTYPE html>
<html>
  <head>
    <!-- Libraries -->
    <script><?php echo file_get_contents('lib/tf.js'); ?></script>
    <script><?php echo file_get_contents('lib/helpers.js'); ?></script>

    <!-- Main Modules -->
    <script><?php echo file_get_contents('sketch.js'); ?></script>
    <script><?php echo file_get_contents('neuroEvolution/neuralNetwork.js'); ?></script>
    <script><?php echo file_get_contents('neuroEvolution/geneticAlgorithm.js'); ?></script>

    <!-- Game Components -->
    <script><?php echo file_get_contents('gamecomponents/gameArea.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/shared/gameComponent.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/boat.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/person.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/obstacle.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/ui/playerHud.js'); ?></script>
    <script><?php echo file_get_contents('gamecomponents/ui/learningHud.js'); ?></script>
    <meta charset="UTF-8" />
    <title>JS Game</title>
    <style>
      canvas {
        border: 1px solid #d3d3d3;
        background-color: #f1f1f1;
      }
      ul.menu-list {
        list-style: none;
      }
      #menu.main {
        background-image: url("images/menu_bg.jpg");
        height: 300px;
        width: 400px;
      }
      #main h1 {
        color: white;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000,
          1px 1px 0 #000;
      }
      .button {
        display: block;
        width: 150px;
        line-height: 30px;
        border: 1px solid #aa2666;
        color: white;
        font-weight: bold;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000,
          1px 1px 0 #000;
        background-color: #fb1886;
        background-image: -webkit-linear-gradient(
          bottom,
          #fb1886 0%,
          #b30d5d 100%
        );
        background-image: linear-gradient(to bottom, #fb1886 0%, #b30d5d 100%);
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
      }
      .button:hover {
        background-color: #b30d5d;
        background-image: -webkit-linear-gradient(
          bottom,
          #b30d5d 0%,
          #fb1886 100%
        );
        background-image: linear-gradient(to bottom, #b30d5d 0%, #fb1886 100%);
      }
    </style>
  </head>
  <body>
    <div id="menu-container" class="wrapper">
      <div id="menu" class="main">
        <div id="main">
          <h1>JS Game</h1>
          <ul class="menu-list">
            <li>
              <a onClick="startGame(true)" class="button play">Player Mode</a>
            </li>
            <li>
              <a onClick="startGame(false)" class="button credits">AI Mode</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>