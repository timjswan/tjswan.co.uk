import React, { Component } from "react";
import "./examples.css";
import Example from "./Example";

class Examples extends Component {
	constructor(props){
		super(props);

		this.state = {
			examples: [],
			intervalIsSet: false,
			slide: 1
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
			//console.log(JSON.stringify(data.json()));
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

	setActiveSlide = (n, slides) => {
		for(let slide of slides){
			slide.style.display = 'none';
		}
		slides[n].style.display = 'block';
	};

	slide = (n) => {
		const slides = document.getElementsByClassName("example-slide");
		const slideAmount = slides.length;
	
		this.setState(() => {
			const { slide } = this.state;
			if(n > slideAmount)
				return {slide: 1};

			else if(n < 1)
				return {slide: slideAmount};

			else
				return {slide: n}
		});
		this.setActiveSlide(this.state.slide - 1, slides);
	};

	render(){
		const { examples } = this.state;
		return (
			<div className="examples-container">
				{examples.length <= 0
				? "No data"
				: examples.map(example => (
					<Example key={example.numericalIndex} exampleData={example} />
				))}
				<button onClick={() => this.slide(this.state.slide - 1)} className="example-control example-prev"><img src='img/carouselprev.png' alt="" /></button>
				<button onClick={() => this.slide(this.state.slide + 1)} className="example-control example-next"><img src='img/carouselnext.png' alt="" /></button>
			</div>
		);
	}
}

export default Examples;