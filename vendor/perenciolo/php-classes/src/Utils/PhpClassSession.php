<?php

namespace Perenciolo\Utils;

abstract class PhpClassSession
{
    /**
     * [ Debug session ] Cria uma linha de sessão para exemplos
     * @var $color = red | green | yellow | blue
     * @var line = __LINE__
     */
    public static function dump($debug_val, $line, $file, $color = null)
    {
        ini_set('xdebug.overload_var_dump', 1);
        ini_set('xdebug.var_display_max_children', 7);

        $line = (!empty($line) ? " <span class='line-session'>Linha {$line}</span>" : "");
        $file = (!empty($file) ? "[ {$file} | {$line} ]" : "[ {$line} ]");
        echo "<style>
          @import url('https://fonts.googleapis.com/css?family=Open+sans|Source+Code+Pro');

          pre {
              display: block;
              padding: 9.5px;
              margin: 0 0 10px;
              font-size: 13px;
              line-height: 1.42857143;
              color: greenyellow !important;
              word-break: break-all;
              word-wrap: break-word;
              background-color: #1F2026 !important;
              border: 1px solid #ccc;
              border-radius: 4px;
              /* white-space: nowrap; */
          }

          .code {
              font-family: \"Source Code Pro\", monospace;
              background: #475163;
              color: #FFFFFF;
              padding: 20px;
              -webkit-border-radius: 4px;
              -moz-border-radius: 4px;
              border-radius: 4px;
              vertical-align: middle;
          }

          .code *:first-child {
              margin-top: 0;
          }

          .line {
              display: block;
              padding: 10px;
              margin: 30px 0;
              background-color: #1F2026;
          }

          .line-session {
              color: rgba(255, 255, 255, 0.5);
          }

          .line:first-of-type {
              margin-top: 0;
          }
      </style>";
        $color = (!empty($color) ? "var(--{$color})" : "");
        echo "<code class='code line' style='background-color: {$color}'>";
        echo '<pre>';
        var_export($debug_val);
        echo '</pre>';
        echo $file;
        echo "</code>";
    }

}
