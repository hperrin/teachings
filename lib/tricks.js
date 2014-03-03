
(function(window, $){
	window.tricks = function(classname, scope){
		this.classname = classname;
		if (typeof scope !== "undefined") {
			this.scope = scope;
		} else {
			this.scope = window;
		}
	};
	$.extend(window.tricks.prototype, {
		getScript: function(id){
			return $('#tricks-script-'+this.classname+'-'+id, this.scope);
		},
		putScript: function(id, source){
			var elem = this.getScript(id);
			if (elem.length) {
				elem.html(source);
			} else {
				$('<script id="tricks-script-'+this.classname+'-'+id+'" type="text/javascript"></script>').html(source).appendTo($("head", this.scope));
			}
		},
		delScript: function(id){
			this.getScript(id).remove();
		},
		getStyle: function(id){
			return $('#tricks-style-'+this.classname+'-'+id, this.scope);
		},
		putStyle: function(id, source){
			var elem = this.getStyle(id);
			if (elem.length) {
				elem.html(source);
			} else {
				console.log($("head", this.scope));
				$('<style id="tricks-style-'+this.classname+'-'+id+'" type="text/css"></style>').html(source).appendTo($("head", this.scope));
			}
		},
		delStyle: function(id){
			this.getStyle(id).remove();
		}
	});

	$(function(){

	});
})(window, jQuery);
