var app = new Vue({
  el:'#app',
  data:{
    comment:'',
    reply:'',
    show:false,
    showbtn:true
  },
  methods:{
  	showForm() {
  		this.show = true;
  		this.showbtn = !this.showbtn;
  	},
  	getReply(){
  		console.log(this.reply);
  	},
  	getComment() {
  		console.log();

  		axios.post('/add-comment',this.comment)
  		.then(function (res) {
  			console.log(res.data);
  		})
  		.catch(function (error) {
  			console.log(error.data);
  		})
  	}
  }
});