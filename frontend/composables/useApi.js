export default async ( url, options = {}, is_error = false ) => {
    const route = useRoute();
    const config = useRuntimeConfig();
    const WP_DEV = config.public.WP_DEV;

    const { data: result, error, status } = await useAsyncData( `${ route.params.slug }`, () =>
            $fetch( `${ WP_DEV }${ url }`, options ).catch( ( error ) => error.data ), {
            transform: ( resData ) => {
                return resData;
            },
        },
    );

    if ( is_error && result.value.data.status === 404 ) {
        throw createError( { statusCode: 404, statusMessage: 'Page Not Found' } )
    }

    return {
        result,
        error,
        status,
    };
}