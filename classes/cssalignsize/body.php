<?php
defined('TRICKS') or die('Direct access prohibited');
?>
<style scoped="scoped" type="text/css">
	.css-output, .css-source {
		height: 600px;
		width: 48%;
	}
	#editor, #editor2 {
		height: 299px;
	}
	#editor {
		margin-bottom: 2px;
	}
	#output {
		height: 100%;
		width: 100%;
	}
	#presets {
		margin-top: 15px;
	}
	#presets .source {
		display: none;
	}
</style>
<div class="css-output pull-right">
	<iframe id="output" src="classes/cssalignsize/frame.html"></iframe>
</div>
<div class="css-source">
	<div id="editor">.box {
	position: relative;
	left: 50px;
	top: 10px;
	background-color: pink;
}
p {
	border: 1px solid black;
	background-color: cyan;
	color: #333;
	text-align: center;
	line-height: 50px;
	height: 50px;
	width: 220px;
}</div>
	<div id="editor2"><?php
$body = <<<'EOF'
<p>
	I'm content before the box.
</p>
<p class="box">
	I'm the box.
</p>
<p>
	I'm content after the box.
</p>
<p style="height: 500px; line-height: 500px; width: 100%;">
	I'm more content after the box.
</p>
EOF;
echo htmlspecialchars($body);?></div>
</div>
<div class="panel panel-default" id="presets">
	<div class="panel-heading">
		<h3 class="panel-title">Presets</h3>
	</div>
	<div class="panel-body">
		<button class="btn btn-default">Relative Position<div class="source">.box {
	position: relative;
	left: 50px;
	top: 10px;
	background-color: pink;
}
p {
	border: 1px solid black;
	background-color: cyan;
	color: #333;
	text-align: center;
	line-height: 50px;
	height: 50px;
	width: 220px;
}</div></button>
		<button class="btn btn-default">Absolute Position<div class="source">.box {
	position: absolute;
	left: 50px;
	top: 10px;
	background-color: pink;
}
p {
	border: 1px solid black;
	background-color: cyan;
	color: #333;
	text-align: center;
	line-height: 50px;
	height: 50px;
	width: 220px;
}</div></button>
		<button class="btn btn-default">Fixed Position<div class="source">.box {
	position: fixed;
	left: 50px;
	top: 10px;
	background-color: pink;
}
.box:after {
	content: 'Fixed and absolute look the same, but try scrolling.';
	line-height: normal;
	display: block;
	background-color: yellow;
	border: 1px solid black;
	margin-top: 5px;
	padding: 5px;
}
p {
	border: 1px solid black;
	background-color: cyan;
	color: #333;
	text-align: center;
	line-height: 50px;
	height: 50px;
	width: 220px;
}</div></button>
	</div>
</div>
<script src="classes/cssalignsize/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/css");
    var editor2 = ace.edit("editor2");
    editor2.setTheme("ace/theme/monokai");
    editor2.getSession().setMode("ace/mode/html");


	$(function(){
		var update = function(){
				var context = $("#output").get(0).contentDocument.children[0],
					itricks = new tricks('cssalignsize', context);
				itricks.putStyle('main', editor.getValue());
				$("body", context).html(editor2.getValue());
			};
		setTimeout(update, 200);
		editor.on("change", update);
		editor2.on("change", update);

		$("#presets").on("click", ".btn", function(){
			editor.setValue($(this).find(".source").html(), -1);
		});
	});
</script>