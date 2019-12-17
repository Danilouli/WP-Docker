<div id="sfrdv-app" v-bind:title="message">
	Htmlu Content <?php echo (1+1)?>
	{{message}}
	<vuejs-datepicker
		:language="fr"
		calendar-class="sfrdv-datepicker"
		input-class="sfrdv-dateinput"
		wrapper-class="sfrdv-datepickerwrapper"
		@selected="onSelectDate"
		:inline="isinline"
	/>
</div>
<style>
	#sfrdv-app {
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
</style>