import Autocomplete from "@mui/material/Autocomplete";
import TextField from "@mui/material/TextField";
import React from "react";

type Optional = { id: string; label: string };

const SelectInput = (props: {
  optionals: Optional[];
  disableClearable?: boolean;
  value?: string;
  endAdornment?: React.ReactNode;
  onChange: (id?: string) => void;
  error?: string;
  size?: "medium" | "small";
}) => {
  const { optionals, value, onChange, disableClearable } = props;

  const current = optionals.filter(x => x.id === props.value)[0];

  return (
    <Autocomplete
      key={props.value ?? "no-id-defined"}
      options={props.optionals}
      value={current}
      getOptionLabel={item => {
        return `${item.label}`;
      }}
      disableClearable={disableClearable}
      getOptionKey={item => item.id!}
      onChange={(e, val) => {
        onChange((val || undefined)?.id);
      }}
      renderOption={(props, options, valueIndex) => {
        return (
          <li {...props}>
            <div>
              <span
                key={valueIndex.index}
                style={{
                  fontWeight: options.id === value ? 700 : "inherit",
                }}
              >
                {`${options.label}`}
              </span>
            </div>
          </li>
        );
      }}
      renderInput={params => {
        if (props.endAdornment) {
          let endAdporment = params.InputProps.endAdornment;
          // @ts-ignore
          let children = React.Children.toArray(endAdporment.props?.children) as any;
          children = children.concat(props.endAdornment);
          // @ts-ignore
          const endAdornment = React.cloneElement(endAdporment, endAdporment.props, children);
          // @ts-ignore
          return (
            <TextField
              {...params}
              InputProps={{ ...params.InputProps, endAdornment }}
              size={props.size}
              error={!!props.error}
              helperText={props.error}
            />
          );
        }
        return <TextField {...params} size={props.size} error={!!props.error} helperText={props.error} />;
      }}
    />
  );
};

export default SelectInput;
