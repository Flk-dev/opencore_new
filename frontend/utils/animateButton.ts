export default ( event: any ) => {
    const rect = event.target.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;

    event.currentTarget.style.setProperty( "--xPos", x + "px" );
    event.currentTarget.style.setProperty( "--yPos", y + "px" );
    // event.currentTarget.style.setProperty( "--width", ( width * 3 ) + "px" );
    // event.currentTarget.style.setProperty( "--height", ( width * 3 ) + "px" );
};