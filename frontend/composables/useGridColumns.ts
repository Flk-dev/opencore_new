export default (data: object) => {
    const windowWidth = ref(0);

    const setWindowWidth = () => {
        windowWidth.value = window.innerWidth;
    }

    onMounted(() => {
        setWindowWidth();
        window.addEventListener('resize', setWindowWidth);
    });

    const r: object = ref({
        colLeft: [],
        colRight: [],
    });

    if (windowWidth.value < 992) {
        r.value.colLeft = data;
        r.value.colRight = [];
    } else {
        data.forEach((element, index) => {
            index += 1;
            if (index % 2 === 0) {
                r.value.colRight.push(element);
            } else {
                r.value.colLeft.push(element);
            }
        });
    }

    return r;
};