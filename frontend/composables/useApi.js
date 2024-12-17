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

    const errorHandler = () => {
        if ( is_error ) {
            console.log( result.value );
            if ( result.value.data.hasOwnProperty( 'status' ) && result.value.data.status === 404 ) {
                console.log( result.value.data );
                throw createError( { statusCode: 404, statusMessage: 'Page Not Found' } );
            }
        }
    };

    // TODO: Add errors handler
    errorHandler();

    return {
        result,
        error,
        status,
    };
}