import React, { Component } from "react";
import "./examples.css";
import Example from "./Example";

class Examples extends Component {
	constructor(props){
		super(props);

		this.state = {
			examples: [],
			intervalIsSet: false
		};
	}

	componentDidMount() {
		this.getDataFromDb();
		if (!this.state.intervalIsSet) {
			let interval = setInterval(this.getDataFromDb, 1000);
			this.setState({ intervalIsSet: interval });
		}
	}

	componentWillUnmount() {
		if (this.state.intervalIsSet) {
			clearInterval(this.state.intervalIsSet);
			this.setState({ intervalIsSet: null });
		}
	}

	getLastId = (examples) => {
		let lastId = 0;
		examples.sort((a,b) => {
			return a.numericalIndex > b.numericalIndex;
		});

		examples.sort();

		while(lastId < examples.length){
			lastId++;
		}

		return lastId;
	}

	getDataFromDb = () => {
		fetch("http://timubuntuvm:3001/api/getData")
		.then((data) => {
			if(!data.ok){
				return data.text().then(result => Promise.reject(new Error(result)));
			}
			//console.log(data);
			return data.json();
		})
		.then((res) => {
			this.setState({ examples: res.data })
			this.props.lastId(this.getLastId(res.data));
		})
		.catch((err) => {
			console.log(err);
		});
	};

	render(){
		const { examples } = this.state;
		//const currentIds = examples.numericalIndex;
		return (
			<ul id="examples" key="1">
				{examples.length <= 0
				? "No data"
				: examples.map(example => (
					<Example key={example.numericalIndex} exampleData={example} />
				))}
			</ul>
		);
	}
}

export default Examples;