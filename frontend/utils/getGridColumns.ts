export default ( data: string[] ) => {
    if ( ! data ){}

    const cols = ref( {
        col_1: [],
        col_2: [],
    } );

    if ( ! data ){
        return cols;
    }

    data.forEach((element: any, index: number) => {
        index += 1;
        if (index % 2 === 0) {
            cols.value.col_2.push(element);
        } else {
            cols.value.col_1.push(element);
        }
    });


    return cols;
}