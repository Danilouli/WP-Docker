<div id="sfrdv-app">
	<sfrdv-item agency="pere_lachaise"></sfrdv-item>
</div>
<style>
	:root {
		--sfrdv-blue : #0F69A8;
		--sfrdv-blue2 : #1C8BA6;
	}
	#sfrd-app {
		position : relative;
		width : 100%;
		height : 100vh;
	}
	.sfrdv-reset {
		max-width : none !important;
		max-height : none;
		margin : 0;
		padding : 0;
	}
	.sfrdv-element {
		position : relative;
		height : 100vh;
	}
	.sfrdv-datepickerwrapper {
		width : 300px;
		position : relative;
	}
	.sfrdv-datepicker {
		position : relative;
		width : 100%;
	}
	.sfrdv-datepicker header span {
		background-color : var(--sfrdv-blue);
		color : white;
	}
	.sfrdv-datepicker header span:hover {
		background-color : var(--sfrdv-blue) !important;
		color : white !important;
	}
	.sfrdv-datepicker header .prev:after {
		border-right : 10px solid white;
	}
	.sfrdv-datepicker header .next:after {
		border-left : 10px solid white;
	}
	.sfrdv-datepicker header .prev.disabled:after {
		border-right : 10px solid transparent !important;
	}
	.sfrdv-datepicker header .next.disabled:after {
		border-left : 10px solid transparent !important;
	}
	.sfrdv-datepicker .cell {
		font-size : 15px;
	}
	.sfrdv-datepicker .cell.day-header, .sfrdv-datepicker .cell.day-header:hover {
		background-color : var(--sfrdv-blue2);
		color : white;
		height : 30px;
		line-height : 30px;
		text-transform : uppercase;
		font-size : 55%;
		font-weight : bold;
	}
</style>