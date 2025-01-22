import { ThemeProvider } from "@mui/material/styles";
import createCache from "@emotion/cache";
import Theme from "../../theme";
import {useMemo} from "react";
import {TssCacheProvider} from "tss-react";
//import { StylesProvider, jssPreset } from '@material-ui/core/styles';
//import { jssPreset, StylesProvider } from "@mui/styles";
//import { create } from "jss";

// @ts-ignore
//import increaseSpecificity from 'jss-increase-specificity';
/*
const jss = create({
    plugins: [...jssPreset().plugins, increaseSpecificity({ repeat: 1 })],
});
*/



const ThemeContextOverlay = (props: { children: React.ReactNode, shadowContainer?: HTMLElement }) => {
    const cssCache = useMemo(() => {
        if (props.shadowContainer) {
            return createCache({
                key: "css",
                prepend: true,
                container: props.shadowContainer
            })
        }
        return  null;

    }, [props.shadowContainer]);

    if (cssCache)
        return <TssCacheProvider value={cssCache}>
            <ThemeProvider theme={Theme}>{props.children}</ThemeProvider>
        </TssCacheProvider>;
    return <ThemeProvider theme={Theme}>{props.children}</ThemeProvider>
};

export default ThemeContextOverlay;
