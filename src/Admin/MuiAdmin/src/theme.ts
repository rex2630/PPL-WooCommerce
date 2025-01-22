import { createTheme } from "@mui/material/styles";
import themeSetting from "./theme.setting";

// eslint-disable-next-line @typescript-eslint/no-explicit-any
const theme = createTheme(themeSetting as any);
export default theme;
