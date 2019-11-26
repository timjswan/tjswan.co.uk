import React, { Component } from "react";
import "./nav.css";

class NavSocial extends Component {
	handleClick(){
		const navMenu = document.getElementById('nav-social-menu');
		navMenu.classList.toggle('active');
	}

	handleScroll(e){
		e.preventDefault();
		let link = e.target.href;
		let linkSpl = link.split('#');
		let scrollEl = document.getElementById(linkSpl[1]);

		scrollEl.scrollIntoView({behavior: "smooth"});
	}

	render(){
		return (
			<React.Fragment>
				<a className="link" href="#about" onClick={(e) => this.handleScroll(e)}>About</a>
	        	<a className="link" href="#contact" onClick={(e) => this.handleScroll(e)}>Contact</a>
	        	
		        <div id="nav-social-menu">
		          <button className="nav-social-menu-toggle" onClick={() => this.handleClick()}><img className="expanded" src="img/menudown.png" alt="" /></button>
		          <ul className="social">
		            <li className="social-item"><a href="http://facebook.com"><img src="img/facebook.png" alt="" /></a></li>
		            <li className="social-item"><a href="http://instagram.com"><img src="img/instagram.png" alt="" /></a></li>
		            <li className="social-item"><a href="http://twitter.com"><img src="img/twitter.png" alt="" /></a></li>
		            <li className="social-item"><a href="http://linkedin.com"><img src="img/linkedin.png" alt="" /></a></li>
		            <li className="social-item"><a href="http://github.com"><img src="img/github.png" alt="" /></a></li>
		          </ul>
		        </div>
	        </React.Fragment>
		)
	}
}

export default NavSocial;