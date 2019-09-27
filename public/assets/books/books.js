Vue.component('book', {
	props: {
		title: {
			type: String
		},
		slug: {
			type: String
		},
		image_cover: {
			type: String
		},
		image_spine: {
			type: String
		},
		image_back: {
			type: String
		},
	},
	
	template: `
		<div class='book'>
			<h1>{{ title }}</h1>
			<p>{{ slug }}</p>

			<img :src="image_cover">
		</div>
	`,
	
	methods: {
		incPages: function(step) {
			this.counted += step
			this.$emit('update-pages', this.counted)
		}
	},
	
	computed: {
		summary() {
			return this.message + ', ' + this.counted + ' pages';
		}
	},
	
	data() {
		return {
			image_cover: './assets/img/hammock.png',
			message: 'hello world',
			pages: ["Intro", "Table of Contents", "1", "2", "3"],
			counted: 0
		}
	}
});

var app = new Vue({
	el: 'main',
	data: {
		readPages: []
	},
	methods: {
		updatePages(pageId) {
			this.readPages.push(pageId)
		}
	}
});
