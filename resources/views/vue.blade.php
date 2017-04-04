@extends('layouts.base')

@section('content')
	<div id="app">
		@{{ message }}
	</div>
	<div id="app2">
		<span v-bind:title="message">
			Hover your mouse over me for a few seconds to see my dynamically bound title!
		</span>
	</div>
	<div id="app3">
		<p v-if="seen">NOW YOU SEE ME</p>
	</div>
	<div id="app4">
		<ol>
			<li v-for="todo in todos">
				@{{ todo.text }}
			</li>
		</ol>
	</div>
	<div id="app5">
		<p></p>
		<button v-on:click="plusMessage">@{{ message }}</button>
	</div>
	<div id="app6">
		<p>@{{ message }}</p>
		<input v-model="message">
	</div>

	<div id="app-7">
  
    	<boton-perfil v-for="item in groceryList" v-bind:todo="item"></boton-perfil>
    	<input-biografy v-bind:bio="item"></input-biografy>
	</div>
@endsection

@section('scripts')
<script>
	var app = new Vue({
		el: '#app',
		data:{
			message: 'Hello Vue!'
		}
	});

	var app2 = new Vue({
		el: '#app2',
		data: {
			message: 'you loaded this page on ' + new Date()
		}
	});

	var app3 = new Vue({
		el: '#app3',
		data: {
			seen: true
		}
	});

	var app4 = new Vue({
		el: '#app4',
		data: {
			todos: [
				{ text: 'Learn Javascript'},
				{ text: 'Learn Vue'},
				{ text: 'Build something awesome'}
			]
		}
	});

	var app5 = new Vue({
		el: '#app5',
		data: {
			message: 'Biografía'
		},
		methods: {
			plusMessage:function(){
				
				this('<input>');
			}
		}
	});

	var app6 = new Vue({
		el: '#app6',
		data: {
			message: 'Hello Vue!'
		}
	});

	Vue.component('input-biografy', {
	  props: ['bio'],
	  template: '<input type="text">'
	})
	var app7 = new Vue({
	  el: '#app-7',
	  data: {
	    
	  }
	})
</script>
@endsection