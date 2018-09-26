<?php


class Head implements iDisplayable {

    private $title = "RoME";
    private $css_files = array(
        "/static/css/_GLOBALS.css",
        "/static/css/navbar.css",
        "/static/css/jumbotron.css"
    );
    private $js_files = array();
    
    public function set_title($title, $full_title=TRUE) {
        if ($full_title === TRUE) {
            $this->title = $title;
        }
        else {
            $this->title = "RoME - $title";
        }
    }

    public function add_css_file($filename, $include_static=TRUE) {
        if ($include_static === TRUE) {
            array_push($this->css_files, "/static/css/$filename.css");
        }
        else {
            array_push($this->css_files, $filename);
        }
    }

    public function add_js_file($filename, $include_static=TRUE) {
        if ($include_static === TRUE) {
            array_push($this->js_files, "/static/js/$filename.js");
        }
        else {
            array_push($this->js_files, $filename);
        }
    }

    public function get_output() {
        $a = <<<"HEAD_A"
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>$this->title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">\n
HEAD_A;
        $b = "";
        foreach ($this->css_files as $filepath) {
            $b .= "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"$filepath\" />\n";
        }
        $c = "";
        foreach ($this->js_files as $filepath) {
            $c .= "\t<script src=\"$filepath\"></script>\n";
        }
        return $a . $b . $c . "</head>\n<body>\n\n";
    }
}

?>

