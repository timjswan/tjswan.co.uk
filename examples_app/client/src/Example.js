import React, { Component } from "react";
import axios from "axios";
import "./examples.css";

function UnEditable(props) {
	const example = props.example;
	const imgSrc = 'img/' + example.imageFileName;
	const exampleStyle = {
		backgroundImage: 'url(' + imgSrc + ')'
	};

	return (
		<div className="example shadow" style={exampleStyle}>
			<div className="exampleCaption"><a href="{example.url}">{example.title}</a> - {example.description}{example.link}</div>
		</div>
	);
}//

function Editable(props) {
	const example = props.example;
	return (
		<React.Fragment>
		<input onChange={props.handler} type="text" name="title" defaultValue={example.title} className="exampleDataEdit" />
		<input onChange={props.handler} type="text" name="imageFileName" defaultValue={example.imageFileName} className="exampleDataEdit" />
		<input onChange={props.handler} type="text" name="url" defaultValue={example.url} className="exampleDataEdit" />
		<input onChange={props.handler} type="text" name="link" defaultValue={example.link} className="exampleDataEdit" />
		<input onChange={props.handler} type="textarea" name="description" defaultValue={example.description} className="exampleDataEdit" />
		</React.Fragment>
	);
}


class Example extends Component {
	constructor(props){
		super(props);

		this.state = {
			edit: false,
			title: '',
			imageFileName: '',
			url: '',
			link: '',
			description: ''
		}

		this.edit = React.createRef();
		this.save = React.createRef();
	}

	deleteFromDB = idToDelete => {
		let objIdToDelete = null;
		let propsId = this.props.exampleData._id;
		
		if (propsId === idToDelete) {
			objIdToDelete = propsId;

			axios.delete("http://timubuntuvm:3001/api/deleteData", {
				data: {
					id: objIdToDelete
				}
			});
		}		
	};

	updateDB = (idToUpdate, updateToApply) => {
		let objIdToUpdate = null;
		const propsId = this.props.exampleData._id;

		if (propsId === idToUpdate) {
			objIdToUpdate = propsId;

			axios.post("http://timubuntuvm:3001/api/updateData", {
				id: objIdToUpdate,
				update: updateToApply
			});
		}

		this.setEdit(false);
	};

	workOutWhatsChanged = (id) => {
		let updateData = {};		

		if(this.state.edit){
			Object.keys(this.state).forEach(i => {
				var stateItem = this.state[i];
				if(stateItem !== "" && typeof stateItem !== "boolean"){
					updateData[i] = stateItem;
				}
			});

			const updateDataLen = Object.keys(updateData).length;

			if(updateDataLen > 0){
				this.updateDB(id, updateData);
			}
		}
	}

	setEdit = (edit) => {
		this.setState({ edit: edit });

		if(edit){
			this.refs.save.className = "offEdit";
			this.refs.edit.className = "onEdit";
		} else if (!edit){
			this.refs.save.className = "onEdit";
			this.refs.edit.className = "offEdit";
		}
	}

	handleChange = (e) => {
		this.setState({[e.target.name]: e.target.value});
	}

	render(){
		const example = this.props.exampleData;
		let exampleHtml;

		if(this.state.edit){
			exampleHtml = <Editable handler={this.handleChange} example={example} />;
		} else {
			exampleHtml = <UnEditable handler={this.handleChange} example={example} />;
		}

		return (			
			<div className="example-slide fade">
				<div className="controls">
					<button onClick={() => this.deleteFromDB(example._id)}>delete</button>
					<button ref="edit" className="offEdit" onClick={() => this.setEdit(true)}>edit</button>
					<button ref="save" className="onEdit" onClick={() => this.workOutWhatsChanged(example._id)}>save</button>
				</div>
				{exampleHtml}
			</div>
		);
	}
}

export default Example;