$(document).ready(function() {
	// ストライプテーブル
	var stripeMethod = function() {
		// 検索テーブルのストライプ
		$('.searchTable tr').removeClass('searchTableOdd');
		$('.searchTable tr').removeClass('searchTableEven');
		$('.searchTable tr:odd').addClass('searchTableOdd');
		$('.searchTable tr:even').addClass('searchTableEven');
	};
	$(stripeMethod);

	// 行を一つ上に移動させる
	$(document).on("click", ".upList", function() {
		var t = $(this).parent().parent();
		if ($(t).prev("tr")) {
			$(t).insertBefore($(t).prev("tr")[0]);
		}
		stripeMethod();
	});

	// 行を一つ下に移動させる
	$(document).on("click", ".downList", function() {
		var t = $(this).parent().parent();
		if ($(t).next("tr")) {
			$(t).insertAfter($(t).next("tr")[0]);
		}
		stripeMethod();
	});
});
