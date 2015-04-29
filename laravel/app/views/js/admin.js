$(document).ready(function(){
	$( '#crustInsert' ).hide();
	$( '#toppingsInsert' ).hide();
	$( '#sizeInsert' ).hide();
	$( '#crustUpdate' ).hide();
	$( '#toppingsUpdate' ).hide();
	$( '#sizeUpdate' ).hide();
	
	$("#insertCrust").click(function () {
		$( '#crustInsert' ).show();
		$( '#crustUpdate' ).hide();
	});
	$("#insertToppings").click(function () {
		$( '#toppingsInsert' ).show();
		$( '#toppingsUpdate' ).hide();
	});
	$("#insertSize").click(function () {
		$( '#sizeInsert' ).show();
		$( '#sizeUpdate' ).hide();
	});
	$(".updateCrust").click(function () {
		$( '#crustUpdate' ).show();
		$( '#crustInsert' ).hide();
	});
	$(".updateToppings").click(function () {
		$( '#toppingsUpdate' ).show();
		$( '#toppingsInsert' ).hide();
	});
	$(".updateSize").click(function () {
		$( '#sizeUpdate' ).show();
		$( '#sizeInsert' ).hide();
	});
	$(".deleteCrust").click(function () {
		$( '#crustInsert' ).hide();
		$( '#crustUpdate' ).hide();
	});
	$(".deleteToppings").click(function () {
		$( '#toppingsInsert' ).hide();
		$( '#toppingsUpdate' ).hide();
	});
	$(".deleteSize").click(function () {
		$( '#sizeInsert' ).hide();
		$( '#sizeUpdate' ).hide();
	});
});