export default async ( options, watch ) => {
    console.log( options );

    const {data: posts, error, status} = await useAsyncData(
        'cases-post/1',
        () => $fetch('http://openscrore.local/wp-json/opencore/v1/cases', {
            params: options
        }), {
            watch: watch,
            transform: (resData) => {
                return resData.data ? resData.data : resData;
            },
        },
    );

    return {
        posts
    };
}