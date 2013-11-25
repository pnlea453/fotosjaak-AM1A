<form action="index.php?content=register" method="post">
		<table class='simple'>
				<tr>
					<td>voornaam</td>
				</tr>
				<tr>
					<td><input type="text" name="firstname" /></td>
				</tr>
				<tr>
					<td>tussenvoegsel</td>
				</tr>
				<tr>
					<td><input type="text" name="infix" /></td>
				</tr>
				<tr>
					<td>achternaam</td>
				</tr>
				<tr>
					<td><input type="text" name="surname" /></td>
				</tr>
				<tr>
					<td>straat</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="street" />
					</td>
				</tr>
				<tr>
					<td>huisnummer</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="housenumber" />
					</td>
				</tr>
				<tr>
					<td>woonplaats</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="address" />
					</td>
				</tr>
				<tr>
					<td>postcode</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="zipcode" />
					</td>
				</tr>
				<tr>
					<td>geboortedatum</td>
				</tr>
				<tr>
					<td>
						<input type="date" name="date" />
					</td>
				</tr>
				<tr>
					<td>geslacht</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="sex" value="male">Man<br>
						<input type="radio" name="sex" value="female">Vrouw
					</td>
				</tr>
				<tr>
					<td>burgerlijke staat</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="marital_status" value="married">Getrouwd<br>
						<input type="radio" name="marital_status" value="unmarried">Ongehuwd
						<input type="radio" name="marital_status" value="living together">Samen wonend
					</td>
				</tr>
				<tr>
				</tr>
				
				<tr>
					<td>favoriete gamesoort
				</tr>
				<tr>
					<td>
					<select name="favorite_game_genres">
							<option value="1">FPS</option>
							<option value="2">RPG</option>
							<option value="3">MMO</option>
							<option value="4">MMORPG</option>
					</td>
				</tr>
				
				<tr>
					<td>favoriete spel</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="favorite_game" />
					</td>
				</tr>
				<tr>
					<td>e-mail</td>
				</tr>
				<tr>
					<td>
						<input type="e-mail" name="e-mail">
					</td>
				</tr>
				<tr>
					<td>password</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="password" />
					</td>
				</tr>
				
				<tr>
					<td><input type="submit" name="submit" value="verstuur" /></td>
				</tr>
			</table>
</form>
	