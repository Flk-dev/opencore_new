export const getApiUrl = (url: string) => {
    const config = useRuntimeConfig();
    const WP_DEV = config.public.WP_DEV;

    return `${WP_DEV}${url}`;
}