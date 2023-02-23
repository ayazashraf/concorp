<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
<div id="app">
	<div v-for="task in tasks">
			<my-task :task="task"></my-task>
	</div>
	
</div>

<template id="task-template">
	<h1>My tasks</h1>
	<div class="">{{ task.name }}</div>
</template>
</body>
</html>