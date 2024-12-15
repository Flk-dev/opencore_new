export default async ( url, options = {} ) => {
    const route = useRoute();
    const config = useRuntimeConfig();
    const WP_DEV = config.public.WP_DEV;

    const { data: result, error, status } = await useAsyncData(
        `${ route.params.slug }`,
        () =>
            $fetch( `${ WP_DEV }${url}`, options ).catch( ( error ) => error.data ),
        {
            transform: ( resData ) => {
                return resData;
            },
        },
    );

    return {
        result,
        error,
        status,
    };
}