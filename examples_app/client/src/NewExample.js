import React, { Component } from "react";
import axios from "axios";
import "./examples.css";
import "./newExample.css";

class NewExample extends Component {
	constructor(props){
		super(props);

		this.state = {
			title: "",
			imageFileName: "",
			url: "",
			link: "",
			description: ""
		};
	}

	convertWidthToPx = (txtWidth) => {
		let pxWidth = txtWidth * 8;

		return pxWidth + 'px';
	}

	handleChange = (e) => {
		const target = e.target;
		const val = target.value;
		const placeholder = target.placeholder;
		const name = target.name;

		if(target.getAttribute("type") !== "textarea"){
			let width = this.convertWidthToPx(val.length);
			let placeholderWidth = this.convertWidthToPx(placeholder.length);
			target.style.width = width;

			if(target.style.minWidth.length === 0){
				target.style.minWidth = placeholderWidth;
			}
		}

		this.setState({[name]: val});
	}

	handleSubmit = (e) => {
		e.preventDefault();
		let newExample = this.state;
		let newId = this.props.nId;

		newExample['numericalIndex'] = newId;
		axios.post("http://timubuntuvm:3001/api/putData", newExample);
	}

	render(){
		return (
			<form id="newExample" onSubmit={this.handleSubmit}>
				<input onChange={this.handleChange} className="exampleEditData" type="text" placeholder="Title" name="title" />
				<input onChange={this.handleChange} className="exampleEditData" type="text" placeholder="Image File Name" name="imageFileName" />
				<input onChange={this.handleChange} className="exampleEditData" type="text" placeholder="URL" name="url" />
				<input onChange={this.handleChange} className="exampleEditData" type="text" placeholder="Link Type" name="link" />
				<input onChange={this.handleChange} className="exampleEditData" type="textarea" placeholder="Description" name="description" />
				<div className="controls">
					<button type="reset">clear</button>
					<button type="submit">save</button>
				</div>
			</form>
		)
	}
}

export default NewExample;