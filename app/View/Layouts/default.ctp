<?php
/**
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<script src="https://unpkg.com/react@latest/umd/react.development.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/react-dom@latest/umd/react-dom.development.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@material-ui/core/umd/material-ui.development.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/babel-standalone@latest/babel.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<!-- 	<script src="https://fb.me/react-0.13.3.min.js"></script>
	<script src="https://fb.me/JSXTransformer-0.13.3.js"></script> -->
</head>
<body>
	<div id="container">
		<div id="header" class="navbar border-bottom bg-white">
			  <a class="navbar-brand" href="#">Navbar</a>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<div class="d-flex">
				<nav class="col-md-2 d-none d-md-block bg-light sidebar border-right">
			    <div class="sidebar-sticky">
			        <ul>
			        </ul>
			    </div>
			</nav>

			<div class="col-md-10 bg-light pt-3 pb-4">
				<?php echo $this->fetch('content'); ?>
			</div>
			</div>
		</div>
		<div id="footer">

		</div>
	</div>
	    <div id="root"></div>
	    <script type="text/babel">
	const {
	  Button,
	  colors,
	  createMuiTheme,
	  CssBaseline,
	  Icon,
	  MuiThemeProvider,
	  Typography,
	  withStyles,
	  FormControl,
	  MenuItem,
	  TextField,
	  Select,
	  NativeSelect,
	  InputBase,
	} = window['material-ui'];
	const theme = createMuiTheme({
	  palette: {
	    primary: {
	      light: colors.red[300],
	      main: colors.red[500],
	      dark: colors.red[700],
	    },
	    secondary: {
	      light: colors.green[300],
	      main: colors.green[500],
	      dark: colors.green[700],
	    },
	  },
	  typography: {
	    useNextVariants: true,
	  },
	});
	const styles = theme => ({
	  container: {
	    display: 'flex',
	    flexWrap: 'wrap',
	  },
	  textField: {
	    marginLeft: theme.spacing.unit,
	    marginRight: theme.spacing.unit,
	    width: 200,
	  },
	});
	class DatePicker extends React.Component {
	  render() {
	    const { classes } = this.props;
	    return (
	        <MuiThemeProvider theme={theme}>
	            <CssBaseline />
	                  <TextField
	                          id="date"
	                          label=""
	                          type="date"
	                          defaultValue=""
	                          className={classes.textField}
	                          InputLabelProps={{
	                            shrink: true,
	                          }}
	                  />
	        </MuiThemeProvider>
	      );
	  }
	}
	class TextArea extends React.Component {
	  render() {
	    const { classes } = this.props;
	    return (
	        <MuiThemeProvider theme={theme}>
	            <CssBaseline />
	                  <TextField
	                            id="outlined-full-width"
	                            style={{ margin: 0 }}
	                            placeholder="メモ"
	                            multiline
	                            fullWidth
	                            margin="normal"
	                            variant="outlined"
	                            InputLabelProps={{
	                              shrink: true,
	                            }}
	                   />
	        </MuiThemeProvider>
	      );
	  }
	}
	const BootstrapInput = withStyles(theme => ({
	  root: {
	    'label + &': {
	      marginTop: theme.spacing.unit * 3,
	    },
	  },
	  input: {
	    borderRadius: 4,
	    position: 'relative',
	    backgroundColor: theme.palette.background.paper,
	    border: '1px solid #ced4da',
	    fontSize: 16,
	    width: 'auto',
	    padding: '10px 26px 10px 12px',
	    transition: theme.transitions.create(['border-color', 'box-shadow']),
	    // Use the system font instead of the default Roboto font.
	    fontFamily: [
	      '-apple-system',
	      'BlinkMacSystemFont',
	      '"Segoe UI"',
	      'Roboto',
	      '"Helvetica Neue"',
	      'Arial',
	      'sans-serif',
	      '"Apple Color Emoji"',
	      '"Segoe UI Emoji"',
	      '"Segoe UI Symbol"',
	    ].join(','),
	    '&:focus': {
	      borderRadius: 4,
	      borderColor: '#80bdff',
	      boxShadow: '0 0 0 0.2rem rgba(0,123,255,.25)',
	    },
	  },
	}))(InputBase);

	const Date = withStyles(styles)(DatePicker);
	const Textfield = withStyles(styles)(TextArea);
	ReactDOM.render(<Date />, document.getElementById('date'));
	ReactDOM.render(<Textfield />, document.getElementsByClassName('textarea')[0]);
	    </script>
</body>
</html>
