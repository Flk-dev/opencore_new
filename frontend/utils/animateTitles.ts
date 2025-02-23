export const animateTitles = ( [entry]?: IntersectionObserverEntry[] ) => {
    if (entry?.isIntersecting) {
        entry.target.classList.add('animate--animated');
    }
}