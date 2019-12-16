<div id="mp-app" v-bind:title="message">
	Htmlu Content <?php echo (1+1)?>
	{{message}}
	<vuejs-datepicker
		:language="fr"
		calendar-class="mp-datepicker"
		input-class="mp-dateinput"
		wrapper-class="mp-datepickerwrapper"
		@selected="onSelectDate"
		:inline="isinline"
	/>
</div>
<style>
	#mp-app {
		height : 100vh;
	}
	.mp-datepickerwrapper {
		width : 300px;
		position : relative;
	}
	.mp-datepicker {
		position : relative;
		width : 100%;
	}
</style>