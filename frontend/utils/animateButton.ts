export default ( event: any ) => {
    const x = event.clientX - event.target.getBoundingClientRect().left;
    const y = event.clientY - event.target.getBoundingClientRect().top;

    event.currentTarget.style.setProperty( "--xPos", x + "px" );
    event.currentTarget.style.setProperty( "--yPos", y + "px" );
};