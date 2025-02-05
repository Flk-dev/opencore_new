export default ( selector: string, className: string, delay: number ) => {
    const items = document.querySelectorAll(selector);
    let index = ~-items.length;

    return items.length
        ? setInterval(() => {
            index = -~index % items.length;
            items[index].classList.add(className);
        }, delay)
        : null;
}