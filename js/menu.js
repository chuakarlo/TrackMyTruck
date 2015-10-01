// メニューへのアコーディオンの適用
$().ready(function() {

	var group = $("#menuGroupNo").text();

	$("#menu").accordion({
		header : ".menuHeader",
		collapsible : false,
		ollasible : true,
		heightStyle : "content",
		active : Number(group),
		animate : {
			duration : 10
		}
	});

});

$().ready(function() {

	var groupSub = $("#basicMenuGroupNo").text();
	
	$("#basicMenu").accordion({
		header : ".basicMenuHeader",
		collapsible : false,
		ollasible : true,
		heightStyle : "content",
		active : Number(groupSub),
		animate : {
			duration : 10
		}
	});
});



// 暫定：メニューの各リンクは/view以下を絶対パスで参照しているので、コンテキストルートを追加する。
$().ready(function() {
	var root = location.pathname.substring(0, location.pathname.indexOf("/view/") + 5);
	$("a.menuItem").each(function() {
		var href = root + $(this).attr("href");
		$(this).attr("href", href);
	});
});

//暫定：メニューの各リンクは/view以下を絶対パスで参照しているので、コンテキストルートを追加する。
$().ready(function() {
	var root = location.pathname.substring(0, location.pathname.indexOf("/view/") + 5);
	$("a.basicMenuItem").each(function() {
		var href = root + $(this).attr("href");
		$(this).attr("href", href);
	});
});

