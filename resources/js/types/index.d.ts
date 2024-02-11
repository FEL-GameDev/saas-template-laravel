export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    is_owner: boolean;
    role?: {
        name: string;
        id: number;
        role_code: string;
    };
    edit_url?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
};
