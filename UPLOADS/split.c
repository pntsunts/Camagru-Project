/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   split.c                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: pntsunts <marvin@42.fr>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/08/29 15:30:55 by pntsunts          #+#    #+#             */
/*   Updated: 2019/08/29 16:43:53 by pntsunts         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include <stdio.h>
#include <stdlib.h>

char	**ft_split(char *s)
{
	int i = 0;
	int x = 0;
	int y = 0;
	char **res;

	if (!(res = (char **)malloc(sizeof(char*) * 2048)))
		return (NULL);
	while (s[i] == ' ' || s[i] == '\t' || s[i] == '\n')
		i++;
	while (s[i])
	{
		x = 0;
		if (!(res[y] = (char *)malloc(sizeof(char) * 4096)))
			return (NULL);
		while (s[i] != ' ' && s[i] != '\t' && s[i] != '\n')
			res[y][x++] = s[i++];
		while (s[i] == ' ' || s[i] == '\t' || s[i] == '\n')
			i++;
		res[y][x] = '\0';
		y++;
	}
	res[y] = NULL;
	return (res);
}

int main()
{
	int i = 0;
	char **res;
	char *str = "		WE THINK CODE";

	res = ft_split(str);

	while (res[i])
	{
		printf("%s\n", res[i++]);
	}
	printf("\n");
	return (0);
}

/*int	main(int ac, char **av)
{
	int i;
	char	**str;

	i = 0;
	if(ac == 2)
	{
		if (av[1])
		{
			str = ft_split(av[1]);
			while (str[i] != NULL)
				printf("%s\n", str[i++]);
		}
	}
	else
		printf("\n");
	return (0);
}*/




