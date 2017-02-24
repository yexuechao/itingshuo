var list = $('.item');
var hb = $('.hamburger');
var open = false;

function build() {	
	var z = 7;
	$.each(list, function(){
		$(this).css("z-index", z);
		z--;
		$(this).addClass($(this).attr("id"));
	})
}

build();

function explode_burger() {
	$.each(list, function(){
		var self = this;
		var id = $(this).attr('id');	
		un_hover_burger();	
		setTimeout(function(){
			console.log($(self));
			$(self).addClass(id + "-explode");	
		}, 300);
	});
}

function shrink_burger() {
	$.each(list, function(){
		var explodeClass = $(this).attr("id") + "-explode";
		$(this).removeClass(explodeClass);
	});
}

function hover_burger() {
	$.each(list, function(){
		var id = $(this).attr('id');
		$(this).addClass(id + "-hover");
	});
}

function un_hover_burger() {
	$.each(list, function(){
		var id = $(this).attr('id');
		$(this).removeClass(id + "-hover");
	});
}



$(hb).click(function(){
	if (open === false) {
		explode_burger();
		open = true;
	} else {
		shrink_burger();
		open = false;
	}
});

$(hb).hover(function(){
	if (open === false) {
		hover_burger();
	}
}, function(){
	if (open === false) {
		un_hover_burger();
	}
});
//---------------------------------------
var list2 = $('.item2');
var hb2 = $('.hamburger2');
var open2 = false;

function build2() {	
	var z = 7;
	$.each(list2, function(){
		$(this).css("z-index", z);
		z--;
		$(this).addClass($(this).attr("id"));
	})
}

build2();
function explode_burger2() {
	$.each(list2, function(){
		var self = this;
		var id = $(this).attr('id');	
		un_hover_burger2();	
		setTimeout(function(){
			console.log($(self));
			$(self).addClass(id + "-explode");	
		}, 300);
	});
}

function shrink_burger2() {
	$.each(list2, function(){
		var explodeClass = $(this).attr("id") + "-explode";
		$(this).removeClass(explodeClass);
	});
}

function hover_burger2() {
	$.each(list2, function(){
		var id = $(this).attr('id');
		$(this).addClass(id + "-hover");
	});
}

function un_hover_burger2() {
	$.each(list2, function(){
		var id = $(this).attr('id');
		$(this).removeClass(id + "-hover");
	});
}
$(hb2).click(function(){
	if (open2 === false) {
		explode_burger2();
		open2 = true;
	} else {
		shrink_burger2();
		open2 = false;
	}
});

$(hb2).hover(function(){
	if (open2 === false) {
		hover_burger2();
	}
}, function(){
	if (open2 === false) {
		un_hover_burger2();
	}
});