import React, { Component } from "react";
import "./examples.css";
import NewExample from "./NewExample"
import Examples from "./Examples"

class App extends Component {
	constructor(props){
		super(props);
		this.state = {
			lastId: 0
		};
	}

	setLastId = (lastId) => {
		this.setState({ lastId: lastId })
	}

	render(){
		return (
			<React.Fragment>
				<Examples lastId={this.setLastId} />
				<NewExample nId={this.state.lastId} />
			</React.Fragment>
		);
	}
}

export default App;