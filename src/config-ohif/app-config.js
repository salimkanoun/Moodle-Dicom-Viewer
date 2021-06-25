fetch('configuration.json').then( (data)=>{
	return data.json()
}).then ((json)=>{
	window.config = json;
}).catch( (error)=>{
	console.log(error)
})